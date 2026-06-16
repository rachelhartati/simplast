<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentJob;
use App\Models\Item;
use App\Models\User;
use App\Models\StoranAnggota;
use App\Models\Gaji;

class StoranAnggotaController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'role:agent']);
    }
    public function index(Request $request)
    {
        $query = StoranAnggota::where('agent_id', auth()->user()->agent_id)
                              ->with(['user', 'item']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', fn($q) => $q->where('nama_lengkap', 'like', "%$search%"));
        }

        if ($request->filled('bulan')) {
            [$tahun, $bulan] = explode('-', $request->bulan);
            $query->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulan);
        }

        // summary cards pakai data tanpa filter pagination
        $allStoran = (clone $query)->get();

        $storan = $query->orderByDesc('tanggal')->paginate(10)->withQueryString();

        return view('storan_anggota.index', compact('storan', 'allStoran'));
    }

    public function create()
    {
        $anggota = User::where('agent_id', auth()->user()->agent_id)->get();
        $items   = Item::all();
        $agentJobs = AgentJob::with('item')
            ->where('agent_id', auth()->user()->agent_id)
            ->get()
            ->map(fn($j) => [
                'id'       => $j->id,
                'user_id'  => $j->user_id,
                'item_id'  => $j->item_id,
                'item_name'=> $j->item?->nama_item,
                'jumlah'   => $j->jumlah,
                'label'    => 'Job #'.$j->id.' - '.($j->item?->nama_item ?? '-').' ('.$j->jumlah.' kg) - '.\Carbon\Carbon::parse($j->tanggal_diberikan)->format('d/m/Y'),
            ]);
        return view('storan_anggota.tambah', compact('anggota', 'items', 'agentJobs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|exists:user,id',
            'job_id'     => 'required|exists:agent_job,id',
            'item_id'    => 'required|exists:item,id',
            'tanggal'    => 'required|date',
            'jumlah_pcs' => 'required|numeric|min:1',
        ]);

        $total = $request->jumlah_pcs * 185;

        $storanAnggota = StoranAnggota::create([
            'agent_id'   => auth()->user()->agent_id,
            'job_id'     => $request->job_id ?: null,
            'user_id'    => $request->user_id,
            'item_id'    => $request->item_id,
            'jumlah_pcs' => $request->jumlah_pcs,
            'total'      => $total,
            'tanggal'    => $request->tanggal,
        ]);

        Gaji::create([
            'agent_id' => auth()->user()->agent_id,
            'user_id'  => $request->user_id,
            'total'    => $total,
            'storan_anggota_id' => $storanAnggota->id,
        ]);

        return redirect()->route('storan-anggota.index')
                         ->with('success', 'Setoran berhasil disimpan!');
    }

    public function edit($id)
    {
        $storan  = StoranAnggota::where('id', $id)
                                ->where('agent_id', auth()->user()->agent_id)
                                ->firstOrFail();
        $anggota = User::where('agent_id', auth()->user()->agent_id)->get();
        $items   = Item::all();
        $agentJobs = AgentJob::with('item')
            ->where('agent_id', auth()->user()->agent_id)
            ->get()
            ->map(fn($j) => [
                'id'       => $j->id,
                'user_id'  => $j->user_id,
                'item_id'  => $j->item_id,
                'item_name'=> $j->item?->nama_item,
                'jumlah'   => $j->jumlah,
                'label'    => 'Job #'.$j->id.' - '.($j->item?->nama_item ?? '-').' ('.$j->jumlah.' kg) - '.\Carbon\Carbon::parse($j->tanggal_diberikan)->format('d/m/Y'),
            ]);
        return view('storan_anggota.edit', compact('storan', 'anggota', 'items', 'agentJobs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'    => 'required|exists:user,id',
            'job_id'     => 'required|exists:agent_job,id',
            'item_id'    => 'required|exists:item,id',
            'tanggal'    => 'required|date',
            'jumlah_pcs' => 'required|numeric|min:1',
        ]);

        $storan = StoranAnggota::where('id', $id)
                               ->where('agent_id', auth()->user()->agent_id)
                               ->firstOrFail();

        $total = $request->jumlah_pcs * 185;

        $storan->update([
            'job_id'     => $request->job_id ?: null,
            'user_id'    => $request->user_id,
            'item_id'    => $request->item_id,
            'jumlah_pcs' => $request->jumlah_pcs,
            'total'      => $total,
            'tanggal'    => $request->tanggal,
        ]);

        Gaji::updateOrCreate(
            ['storan_anggota_id' => $storan->id],
            [
                'agent_id' => auth()->user()->agent_id,
                'user_id'  => $request->user_id,
                'total'    => $total,
            ]
        );

        return redirect()->route('storan-anggota.index')
                         ->with('success', 'Setoran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $storan = StoranAnggota::where('id', $id)
                               ->where('agent_id', auth()->user()->agent_id)
                               ->firstOrFail();

        Gaji::where('storan_anggota_id', $storan->id)->delete();

        $storan->delete();

        return redirect()->route('storan-anggota.index')
                         ->with('success', 'Setoran berhasil dihapus.');
    }
}
