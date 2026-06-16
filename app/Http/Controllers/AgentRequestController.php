<?php namespace App\Http\Controllers;

use App\Models\AgentRequest;
use App\Models\AgentStok;
use App\Models\Item;
use App\Models\Stok;
use Illuminate\Http\Request;

class AgentRequestController extends Controller {
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

    public function store(Request $request) {
    $request->validate([
        'item_id' => 'required|exists:item,id',
        'jumlah_barang' => 'required|numeric|min:1',
    ]);

    AgentRequest::create([
        'agent_id' => auth()->user()->agent_id,
        'tanggal_request' => now(),
        'item_id' => $request->item_id,
        'jumlah_barang' => $request->jumlah_barang,
        'total' => $request->jumlah_barang * 25,
        'status' => AgentRequest::STATUS_WAITING,
    ]);

    return redirect()->route('request.index')->with('success', 'Request berhasil dikirim');
}

    public function show($id) {
        $agentRequest=AgentRequest::with('item', 'agent', 'approver', 'rejector')->findOrFail($id);
        return view('request.detail', compact('agentRequest'));
    }

    public function edit($id) {
        $agentRequest=AgentRequest::findOrFail($id);

        if ($agentRequest->status !==AgentRequest::STATUS_WAITING) {
            return back()->with('error', 'Hanya request dengan status waiting yang bisa diedit!');
        }

        $items=Item::all();
        return view('request.edit', compact('agentRequest', 'items'));
    }

    public function update(Request $request, $id) {
    $agentRequest = AgentRequest::findOrFail($id);

    if ($agentRequest->status !== AgentRequest::STATUS_WAITING) {
        return back()->with('error', 'Hanya request dengan status waiting yang bisa diupdate!');
    }

    $request->validate([
        'item_id' => 'required|exists:item,id',
        'jumlah_barang' => 'required|numeric|min:1',
    ]);

    $agentRequest->update([
        'item_id' => $request->item_id,
        'jumlah_barang' => $request->jumlah_barang,
        'total' => $request->jumlah_barang * 25,
    ]);

    return redirect()->route('request.index')->with('success', 'Request berhasil diperbarui');
}

    public function destroy($id) {
        $agentRequest=AgentRequest::findOrFail($id);

        if ($agentRequest->status !==AgentRequest::STATUS_WAITING) {
            return back()->with('error', 'Hanya request dengan status waiting yang bisa dihapus!');
        }

        $agentRequest->delete();
        return redirect()->route('request.index')->with('success', 'Request berhasil dihapus');
    }

    public function approve(Request $request, $id)
{
    $agentRequest = AgentRequest::findOrFail($id);

    if ($agentRequest->status !== AgentRequest::STATUS_WAITING) {
        return back()->with('error', 'Hanya request dengan status waiting yang bisa diapprove!');
    }

    // Kurangi stok di tabel item
    $item = Item::findOrFail($agentRequest->item_id);

    if ($item->stok < $agentRequest->jumlah_barang) {
        return back()->with('error', 'Stok tidak mencukupi!');
    }

    $item->decrement('stok', $agentRequest->jumlah_barang);

    // Tambah atau update stok agent
    $agentStok = AgentStok::where('agent_id', $agentRequest->agent_id)
        ->where('item_id', $agentRequest->item_id)
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

    // Update status request
    $agentRequest->update([
        'status' => AgentRequest::STATUS_APPROVED,
        'approved_at' => now(),
        'approved_by' => auth()->id(),
    ]);

    return redirect()->route('request.index')->with('success', 'Request berhasil diapprove!');
}
public function reject(Request $request, $id)
{
    $request->validate([
        'rejected_reason' => 'required|string|max:255',
    ]);

    $agentRequest = AgentRequest::findOrFail($id);

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
}

}

