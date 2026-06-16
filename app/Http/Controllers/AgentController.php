<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AgentController extends Controller
{
 public function index(Request $request)
{
    $query = Agent::withCount('users');

    if (!auth()->user()->hasRole(['admin'])) {
        $query->where('id', auth()->user()->agent_id);
    }

    if ($request->filled('search')) {
        $query->where('nama_agent', 'like', '%' . $request->search . '%');
    }

    $agent = $query->paginate(10)->withQueryString();

    return view('agent.agent', compact('agent'));
  }

  public function detail($id){
    $agent = Agent::findOrFail($id);
    $user = User::where('agent_id', $id)->get();
    return view('agent.detail', compact('agent', 'user'));
  }

  public function create(){
    return view('agent.tambah');
  }

  public function store(Request $request){
    $request->validate([
        'nama_agent' => 'required|string',
        'alamat_agent' => 'required|string',
        'no_tlp_agent' => 'required|string',
    ]);

    $agent = Agent::create([
        'nama_agent' => $request->nama_agent,
        'alamat_agent' => $request->alamat_agent,
        'no_tlp_agent' => $request->no_tlp_agent,
    ]);
    return redirect()->route('agent.index')->with('success', 'Agent berhasil disimpan');
  }

  public function edit($id){
    $agent = Agent::findOrFail($id);
    return view('agent.edit', compact('agent'));
  }

  public function update(Request $request, $id){
    $request->validate([
        'nama_agent' => 'required|string',
        'alamat_agent' => 'required|string',
        'no_tlp_agent' => 'required|string',
    ]);

    $agent = Agent::findOrFail($id);
    $agent->update([
        'nama_agent' => $request->nama_agent,
        'alamat_agent' => $request->alamat_agent,
        'no_tlp_agent' => $request->no_tlp_agent,
    ]);
    return redirect()->route('agent.index')->with('success', 'Agent berhasil diperbarui');
  }

  public function destroy($id){
        $agent = Agent::findOrFail($id);
        $agent->delete();
        return redirect()->route('agent.index')->with('success', 'Agent berhasil dihapus');
  }

  public function createMember($id){
    $agent = Agent::findOrFail($id);
    return view('agent.tambahanggota', compact('agent')); 
  }

  public function storeMember(Request $request){
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'no_tlp' => 'required|string|max:20|unique:user,no_tlp',
        'password' => 'required|string|min:6',
    ]);

    $user = User::create([
        'nama_lengkap' => $request->nama_lengkap,
        'alamat' => $request->alamat,
        'no_tlp' => $request->no_tlp,
        'password' => bcrypt($request->password),
        'agent_id' => $request->agent_id,
        'status' => 1,
    ]);

    $user->assignRole('anggota');

    return redirect()->route('agent.index')->with('success', 'Member berhasil ditambahkan.');
}

}
