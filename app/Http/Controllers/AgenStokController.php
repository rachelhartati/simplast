<?php namespace App\Http\Controllers;
use App\Models\AgentStok;
use App\Models\User;
use App\Models\AgentJob;

use Illuminate\Http\Request;

class AgenStokController extends Controller {

public function __construct(){
    $this->middleware(['auth', 'role:agent']);
}
    public function index() {
        $agent_id=auth()->user()->agent_id;
        $agentstok = AgentStok::with('item') ->where('agent_id', $agent_id) ->get();
        $agent_job = AgentJob::where('agent_id', $agent_id)->get();

        $users = User::where('agent_id', $agent_id)->get();

        return view('agentstok.stok', compact('agentstok', 'users', 'agent_job'));
    }

    public function create() {
        $stok = AgentStok::where('agent_id', auth()->user()->agent_id) ->with('item') ->get();
        $currentUser=auth()->user();
        $users  = User::where('agent_id', auth()->user()->agent_id)->get();

        return view('agentstok.tambah', compact('stok', 'currentUser', 'users'));
    }

   public function store(Request $request){
    $request->validate([
        'user_id'           => 'required|exists:user,id',
        'item_id'           => 'required|exists:item,id',
        'tanggal_diberikan' => 'required|date',
        'jumlah'            => 'required|integer|min:1',
    ]);

    // Cek stok cukup tidak
    $stok = AgentStok::where('agent_id', auth()->user()->agent_id)
                ->where('item_id', $request->item_id)
                ->first();

    if (!$stok || $stok->jumlah_barang < $request->jumlah) {
        return back()->withErrors(['jumlah' => 'Stok tidak mencukupi'])->withInput();
    }

    // Simpan job
    AgentJob::create([
        'agent_id'          => auth()->user()->agent_id,
        'user_id'           => $request->user_id,
        'item_id'           => $request->item_id,
        'tanggal_diberikan' => $request->tanggal_diberikan,
        'jumlah'            => $request->jumlah,
    ]);

    // Kurangi stok agent
    $stok->decrement('jumlah_barang', $request->jumlah);

    return redirect()->route('agentstok.index')->with('success', 'Job berhasil ditambahkan');
}

public function edit($id) {
    $agent_id = auth()->user()->agent_id;
    $job = AgentJob::where('id', $id)->where('agent_id', $agent_id)->firstOrFail();
    $stok = AgentStok::where('agent_id', $agent_id)->with('item')->get();
    $users = User::where('agent_id', $agent_id)->get();
    $currentUser = auth()->user();
    return view('agentstok.edit', compact('job', 'stok', 'users', 'currentUser'));
}

public function update(Request $request, $id) {
    $agent_id = auth()->user()->agent_id;
    $job = AgentJob::where('id', $id)->where('agent_id', $agent_id)->firstOrFail();

    $request->validate([
        'user_id'           => 'required|exists:user,id',
        'item_id'           => 'required|exists:item,id',
        'tanggal_diberikan' => 'required|date',
        'jumlah'            => 'required|integer|min:1',
    ]);

    // Kembalikan stok lama
    $stokLama = AgentStok::where('agent_id', $agent_id)->where('item_id', $job->item_id)->first();
    if ($stokLama) {
        $stokLama->increment('jumlah_barang', $job->jumlah);
    }

    // Cek stok baru cukup tidak
    $stokBaru = AgentStok::where('agent_id', $agent_id)->where('item_id', $request->item_id)->first();
    if (!$stokBaru || $stokBaru->jumlah_barang < $request->jumlah) {
        // Rollback stok lama
        if ($stokLama) $stokLama->decrement('jumlah_barang', $job->jumlah);
        return back()->withErrors(['jumlah' => 'Stok tidak mencukupi'])->withInput();
    }

    $job->update([
        'user_id'           => $request->user_id,
        'item_id'           => $request->item_id,
        'tanggal_diberikan' => $request->tanggal_diberikan,
        'jumlah'            => $request->jumlah,
    ]);

    $stokBaru->decrement('jumlah_barang', $request->jumlah);

    return redirect()->route('agentstok.index')->with('success', 'Distribusi berhasil diperbarui');
}

public function destroy($id) {
    $agent_id = auth()->user()->agent_id;
    $job = AgentJob::where('id', $id)->where('agent_id', $agent_id)->firstOrFail();

    // Kembalikan stok ke agent
    $stok = AgentStok::where('agent_id', $agent_id)
                ->where('item_id', $job->item_id)
                ->first();

    if ($stok) {
        $stok->increment('jumlah_barang', $job->jumlah);
    }

    // Hapus job
    $job->delete();

    return redirect()->route('agentstok.index')->with('success', 'Job berhasil dihapus');   

}
}
