<?php namespace App\Http\Controllers;

use App\Models\AgentRequest;
use App\Models\AgentStok;
use App\Models\Item;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentRequestController extends Controller {

    // Batas maksimal jumlah karung yang boleh dipesan agent dalam satu request
    const MAX_JUMLAH_BARANG = 10;

    public function __construct(){
        $this->middleware('role:admin|agent');
    }

    public function index(Request $request)
    {
        $query = AgentRequest::with('item', 'agent');

        if (!auth()->user()->hasRole(['admin'])) {
            $query->where('agent_id', auth()->user()->agent_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('agent', fn($q) => $q->where('nama_agent', 'like', "%$search%"));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_request', $request->tanggal);
        }

        $requests = $query->latest()->paginate(10)->withQueryString();

        return view('request.request', compact('requests'));
    }

    public function create(Request $request) {
        $items = Item::all();
        $selectedItemId = $request->query('item_id');
        return view('request.tambah', compact('items', 'selectedItemId'));
    }

    /**
     * STORE
     * Dikunci per-item supaya total request yang masih WAITING + request baru
     * ini tidak pernah melebihi stok yang benar-benar tersedia di gudang.
     * Tanpa ini, banyak agent bisa "reserve" stok yang sama secara bersamaan.
     */
    public function store(Request $request) {
        $request->validate([
            'item_id' => 'required|exists:item,id',
            'jumlah_barang' => 'required|numeric|min:1|max:' . self::MAX_JUMLAH_BARANG,
        ], [
            'jumlah_barang.max' => 'Maksimal pemesanan adalah ' . self::MAX_JUMLAH_BARANG . ' karung per request.',
        ]);

        return DB::transaction(function () use ($request) {
            $item = Item::where('id', $request->item_id)->lockForUpdate()->first();

            $sudahDipesan = AgentRequest::where('item_id', $item->id)
                ->where('status', AgentRequest::STATUS_WAITING)
                ->lockForUpdate()
                ->sum('jumlah_barang');

            $sisaStok = $item->stok - $sudahDipesan;

            if ($request->jumlah_barang > $sisaStok) {
                return back()
                    ->withInput()
                    ->with('error', "Stok tidak mencukupi. Sisa stok tersedia: {$sisaStok}");
            }

            AgentRequest::create([
                'agent_id' => auth()->user()->agent_id,
                'tanggal_request' => now(),
                'item_id' => $request->item_id,
                'jumlah_barang' => $request->jumlah_barang,
                'total' => $request->jumlah_barang * 25,
                'status' => AgentRequest::STATUS_WAITING,
            ]);

            return redirect()->route('request.index')->with('success', 'Request berhasil dikirim');
        });
    }

    /**
     * SHOW / DETAIL
     * Admin masuk ke sini untuk melakukan approve/reject.
     * Agent hanya boleh melihat detail miliknya sendiri.
     */
    public function show($id) {
        $agentRequest = AgentRequest::with('item', 'agent', 'approver', 'rejector')->findOrFail($id);

        $this->authorizeView($agentRequest);

        return view('request.detail', compact('agentRequest'));
    }

    /**
     * EDIT
     * Khusus agent (pemilik request). Admin TIDAK diizinkan mengedit sama sekali.
     */
    public function edit($id) {
        $agentRequest = AgentRequest::findOrFail($id);

        $this->authorizeModify($agentRequest);

        if ($agentRequest->status !== AgentRequest::STATUS_WAITING) {
            return back()->with('error', 'Hanya request dengan status waiting yang bisa diedit!');
        }

        $items = Item::all();
        return view('request.edit', compact('agentRequest', 'items'));
    }

    /**
     * UPDATE
     * Khusus agent (pemilik request). Kalau jumlah_barang diubah, jumlah baru itu
     * juga harus divalidasi ulang terhadap sisa stok (dikurangi request WAITING
     * lain, di luar request ini sendiri).
     */
    public function update(Request $request, $id) {
        $request->validate([
            'item_id' => 'required|exists:item,id',
            'jumlah_barang' => 'required|numeric|min:1|max:' . self::MAX_JUMLAH_BARANG,
        ], [
            'jumlah_barang.max' => 'Maksimal pemesanan adalah ' . self::MAX_JUMLAH_BARANG . ' karung per request.',
        ]);

        return DB::transaction(function () use ($request, $id) {
            $agentRequest = AgentRequest::where('id', $id)->lockForUpdate()->firstOrFail();

            $this->authorizeModify($agentRequest);

            if ($agentRequest->status !== AgentRequest::STATUS_WAITING) {
                return back()->with('error', 'Hanya request dengan status waiting yang bisa diupdate!');
            }

            $item = Item::where('id', $request->item_id)->lockForUpdate()->first();

            $sudahDipesanLain = AgentRequest::where('item_id', $item->id)
                ->where('status', AgentRequest::STATUS_WAITING)
                ->where('id', '!=', $agentRequest->id)
                ->lockForUpdate()
                ->sum('jumlah_barang');

            $sisaStok = $item->stok - $sudahDipesanLain;

            if ($request->jumlah_barang > $sisaStok) {
                return back()
                    ->withInput()
                    ->with('error', "Stok tidak mencukupi. Sisa stok tersedia: {$sisaStok}");
            }

            $agentRequest->update([
                'item_id' => $request->item_id,
                'jumlah_barang' => $request->jumlah_barang,
                'total' => $request->jumlah_barang * 25,
            ]);

            return redirect()->route('request.index')->with('success', 'Request berhasil diperbarui');
        });
    }

    /**
     * DESTROY
     * Khusus agent (pemilik request). Admin TIDAK diizinkan menghapus sama sekali
     * (admin hanya bertugas approve/reject lewat halaman Detail).
     */
    public function destroy($id) {
        $agentRequest = AgentRequest::findOrFail($id);

        $this->authorizeModify($agentRequest);

        if ($agentRequest->status !== AgentRequest::STATUS_WAITING) {
            return back()->with('error', 'Hanya request dengan status waiting yang bisa dihapus!');
        }

        $agentRequest->delete();
        return redirect()->route('request.index')->with('success', 'Request berhasil dihapus');
    }

    /**
     * APPROVE
     * Dilakukan admin dari halaman Detail. Titik paling kritis: cek stok +
     * decrement harus atomic. lockForUpdate() mengunci row item sampai
     * transaksi commit/rollback, jadi approve() lain untuk item yang sama
     * harus antre dan akan membaca stok yang sudah ter-update, bukan stok
     * basi (stale read).
     */
    public function approve(Request $request, $id)
    {
        return DB::transaction(function () use ($id) {
            $agentRequest = AgentRequest::where('id', $id)->lockForUpdate()->firstOrFail();

            if ($agentRequest->status !== AgentRequest::STATUS_WAITING) {
                return back()->with('error', 'Hanya request dengan status waiting yang bisa diapprove!');
            }

            $item = Item::where('id', $agentRequest->item_id)->lockForUpdate()->first();

            if ($item->stok < $agentRequest->jumlah_barang) {
                return back()->with('error', 'Stok tidak mencukupi!');
            }

            $item->decrement('stok', $agentRequest->jumlah_barang);

            $agentStok = AgentStok::where('agent_id', $agentRequest->agent_id)
                ->where('item_id', $agentRequest->item_id)
                ->lockForUpdate()
                ->first();

            if ($agentStok) {
                $agentStok->increment('jumlah_barang', $agentRequest->total);
            } else {
                AgentStok::create([
                    'agent_id' => $agentRequest->agent_id,
                    'item_id' => $agentRequest->item_id,
                    'jumlah_barang' => $agentRequest->total,
                ]);
            }

            $agentRequest->update([
                'status' => AgentRequest::STATUS_APPROVED,
                'approved_at' => now(),
                'approved_by' => auth()->id(),
            ]);

            return redirect()->route('request.index')->with('success', 'Request berhasil diapprove!');
        });
    }

    /**
     * REJECT
     * Dilakukan admin dari halaman Detail.
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejected_reason' => 'required|string|max:255',
        ]);

        return DB::transaction(function () use ($request, $id) {
            $agentRequest = AgentRequest::where('id', $id)->lockForUpdate()->firstOrFail();

            if ($agentRequest->status !== AgentRequest::STATUS_WAITING) {
                return back()->with('error', 'Hanya request dengan status waiting yang bisa direject!');
            }

            $agentRequest->update([
                'status' => AgentRequest::STATUS_REJECTED,
                'rejected_at' => now(),
                'rejected_by' => auth()->user()->id,
                'rejected_reason' => $request->rejected_reason,
            ]);

            return redirect()->route('request.index')->with('success', 'Request berhasil direject!');
        });
    }

    /**
     * READ (show/detail): admin boleh lihat detail semua request (untuk
     * approve/reject), agent hanya boleh lihat detail miliknya sendiri.
     */
    private function authorizeView(AgentRequest $agentRequest): void
    {
        if (!auth()->user()->hasRole('admin') && $agentRequest->agent_id !== auth()->user()->agent_id) {
            abort(403, 'Anda tidak memiliki akses ke request ini.');
        }
    }

    /**
     * EDIT/UPDATE/DELETE: admin TIDAK diizinkan sama sekali (tugas admin hanya
     * approve/reject lewat Detail). Hanya agent pemilik request yang boleh
     * mengubah atau menghapus.
     */
    private function authorizeModify(AgentRequest $agentRequest): void
    {
        if (!auth()->user()->hasRole('agent') || $agentRequest->agent_id !== auth()->user()->agent_id) {
            abort(403, 'Anda tidak memiliki akses untuk mengubah request ini.');
        }
    }
}