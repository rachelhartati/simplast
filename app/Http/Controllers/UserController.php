<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agent;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'role:admin']);
    }
    public function index(Request $request)
    {
        $query = User::with('agent', 'roles');

        if ($request->filled('search')) {
            $query->where('nama_lengkap', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('role')) {
            $query->whereHas('roles', fn($q) => $q->where('name', $request->role));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $user = $query->paginate(10)->withQueryString();
        return view('user.user', compact('user'));
    }

    public function create()
    {
        $agent = Agent::all();
        $role = Role::all();
        return view('user.tambah', compact('agent', 'role'));
    }

   public function store(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'alamat'       => 'required|string|max:255',
        'no_tlp'       => 'required|string|max:20|unique:user,no_tlp',
        'password'     => 'required|string|min:6',
        'agent_id'     => 'nullable|exists:agent,id',
        'status'       => 'nullable|in:0,1',
    ]);

    // Jika role yang dipilih adalah 'agent', agent_id harus unik
    if ($request->role === 'agent' && $request->agent_id) {
        $sudahDipakai = User::whereHas('roles', fn($q) => $q->where('name', 'agent'))
            ->where('agent_id', $request->agent_id)
            ->exists();

        if ($sudahDipakai) {
            return back()->withErrors(['agent_id' => 'Agent ini sudah digunakan oleh user dengan role agent lain.'])->withInput();
        }
    }

    $user = User::create([
        'nama_lengkap' => $request->nama_lengkap,
        'alamat'       => $request->alamat,
        'no_tlp'       => $request->no_tlp,
        'password'     => bcrypt($request->password),
        'agent_id'     => $request->agent_id ?? null,
        'status'       => $request->status ?? null,
    ]);

    if ($request->has('role')) {
        $user->assignRole($request->role);
    }

    return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
}

    public function edit($id)
    {
        $user = User::with('agent', 'roles')->findOrFail($id);
        $agent = Agent::all();
        $role = Role::all();
        return view('user.edit', compact('user', 'agent', 'role'));
    }

    public function getUser($id){
    $user = User::with('agent', 'roles')->findOrFail($id);
    return response()->json([
        'user'   => $user,
        'agents' => Agent::all(),
        'roles'  => Role::all(),
    ]);
}

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'alamat'       => 'required|string|max:255',
        'no_tlp'       => 'required|string|max:20|unique:user,no_tlp,' . $user->id,
        'password'     => 'nullable|string|min:6',
        'agent_id'     => 'nullable|exists:agent,id',
        'status'       => 'required|in:0,1',
        'role'         => 'nullable|exists:roles,name',
    ]);

    // Jika role yang dipilih adalah 'agent', agent_id harus unik (kecuali user ini sendiri)
    if ($request->role === 'agent' && $request->agent_id) {
        $sudahDipakai = User::whereHas('roles', fn($q) => $q->where('name', 'agent'))
            ->where('agent_id', $request->agent_id)
            ->where('id', '!=', $user->id) // exclude diri sendiri
            ->exists();

        if ($sudahDipakai) {
            return back()->withErrors(['agent_id' => 'Agent ini sudah digunakan oleh user dengan role agent lain.'])->withInput();
        }
    }

    $user->update([
        'nama_lengkap' => $request->nama_lengkap,
        'alamat'       => $request->alamat,
        'no_tlp'       => $request->no_tlp,
        'agent_id'     => $request->agent_id,
        'status'       => $request->status,
    ]);

    if ($request->filled('password')) {
        $user->update(['password' => bcrypt($request->password)]);
    }

    if ($request->has('role')) {
        $user->syncRoles($request->role);
    }

    return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
}

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
