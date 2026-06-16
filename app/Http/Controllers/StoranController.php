<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\AgentRequest;
use App\Models\Item;
use App\Models\Storan;
use App\Models\User;
use App\Models\Gaji;

class StoranController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'role:admin']);
    }
    public function index(Request $request){
        $query = Storan::with('agent', 'item');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('agent', fn($q) => $q->where('nama_agent', 'like', "%$search%"));
        }

        if ($request->filled('bulan')) {
            [$tahun, $bulan] = explode('-', $request->bulan);
            $query->whereYear('tanggal_setoran', $tahun)->whereMonth('tanggal_setoran', $bulan);
        }

        $storan = $query->latest('tanggal_setoran')->paginate(10)->withQueryString();
        return view('storan.kelola-setoran', compact('storan'));
    }

    public function create(){
        $agent = Agent::all();
        $items = Item::all();
        $agentRequests = AgentRequest::with('item')->get()->map(fn($r) => [
            'id'           => $r->id,
            'agent_id'     => $r->agent_id,
            'item_id'      => $r->item_id,
            'item_name'    => $r->item?->nama_item,
            'jumlah_barang'=> $r->jumlah_barang,
            'harga'        => $r->item?->harga_barang,
            'label'        => 'Req #'.$r->id.' - '.($r->item?->nama_item ?? '-').' ('.$r->jumlah_barang.' karung)',
        ]);
        return view('storan.tambah', compact('agent', 'items', 'agentRequests'));
    }

    public function store(Request $request){
    $request->validate([
        'agent_id'        => 'required|exists:agent,id',
        'req_id'          => 'required|exists:agent_request,id',
        'item_id'         => 'required|exists:item,id',
        'tanggal_setoran' => 'required|date',
        'harga_per_pcs'   => 'required|numeric|min:0',
        'jumlah_pcs'      => 'required|numeric|min:1',
        'total'           => 'required|numeric|min:0',
    ]);

    $first_user = User::where('agent_id', $request->agent_id)->first();

    $storan = Storan::create([
        'agent_id'        => $request->agent_id,
        'req_id'          => $request->req_id ?: null,
        'user_id'         => $first_user?->id,
        'item_id'         => $request->item_id,
        'tanggal_setoran' => $request->tanggal_setoran,
        'harga_per_pcs'   => $request->harga_per_pcs,
        'jumlah_pcs'      => $request->jumlah_pcs,
        'total'           => $request->total,
    ]);

    Gaji::create([
    'storan_id' => $storan->id,
    'agent_id' => $request->agent_id,
    'user_id'  => $first_user?->id,
    'total'    => $request->total,
    ]);

    return redirect()->route('kelola-setoran')->with('success', 'Setoran berhasil disimpan!');
}

public function destroy($id){
    $storan = Storan::findOrFail($id);
    Gaji::where('storan_id', $storan->id)->delete();
    $storan->delete();

    return redirect()->route('kelola-setoran')->with('success', 'Setoran berhasil dihapus!');
}

public function edit($id){
    $storan = Storan::findOrFail($id);
    $agent = Agent::all();
    $items = Item::all();
    $agentRequests = AgentRequest::with('item')->get()->map(fn($r) => [
        'id'           => $r->id,
        'agent_id'     => $r->agent_id,
        'item_id'      => $r->item_id,
        'item_name'    => $r->item?->nama_item,
        'jumlah_barang'=> $r->jumlah_barang,
        'harga'        => $r->item?->harga_barang,
        'label'        => 'Req #'.$r->id.' - '.($r->item?->nama_item ?? '-').' ('.$r->jumlah_barang.' karung)',
    ]);
    return view('storan.edit', compact('storan', 'agent', 'items', 'agentRequests'));
}

public function show($id){
    $storan = Storan::findOrFail($id);
    return view('storan.detail', compact('storan'));
}

public function update(Request $request, $id){
    $request->validate([
        'agent_id'        => 'required|exists:agent,id',
        'req_id'          => 'required|exists:agent_request,id',
        'item_id'         => 'required|exists:item,id',
        'tanggal_setoran' => 'required|date',
        'harga_per_pcs'   => 'required|numeric|min:0',
        'jumlah_pcs'      => 'required|numeric|min:1',
        'total'           => 'required|numeric|min:0',
    ]);

    $storan = Storan::findOrFail($id);
    $storan->update([
        'agent_id'        => $request->agent_id,
        'req_id'          => $request->req_id ?: null,
        'item_id'         => $request->item_id,
        'tanggal_setoran' => $request->tanggal_setoran,
        'harga_per_pcs'   => $request->harga_per_pcs,
        'jumlah_pcs'      => $request->jumlah_pcs,
        'total'           => $request->total,
    ]);

   Gaji::updateOrCreate(
    ['storan_id' => $storan->id],
    [
        'agent_id' => $request->agent_id,
        'user_id'  => $storan->user_id,
        'total'    => $request->total,
    ]
    );

    return redirect()->route('kelola-setoran')->with('success', 'Setoran berhasil diperbarui!');
}
}
