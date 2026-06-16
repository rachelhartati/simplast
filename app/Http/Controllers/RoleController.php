<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RoleController extends Controller {

    public function __construct(){
        $this->middleware(['auth', 'role:admin']);
    }

    public function index() {
        $roles = Role::paginate(10);
        return view('role.role', compact('roles'));
    }

    public function create() {
        return view('role.tambah');
    }

    public function store(Request $request) {
        $request->validate([ 'name'=> 'required|string|unique:roles,name',
            ]);

        Role::create(['name'=> $request->name]);

        return redirect()->route('role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    public function edit($id){
        $role = Role::findOrFail($id);
        return view('role.edit', compact('role'));
    }

    public function destroy($id) {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role berhasil dihapus.');
    }

    public function update(Request $request, $id) {
        $role = Role::findOrFail($id);

        $request->validate([ 'name'=> 'required|string|unique:roles,name,'. $role->id,
            ]);

        $role->name=$request->name;
        $role->save();

        return redirect()->route('role.index')->with('success', 'Role berhasil diperbarui.');

    }

    public function permissions($id) {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions=$role->permissions->pluck('id')->toArray();
        return view('role.detail', compact('permissions', 'role', 'rolePermissions'));
    }


    public function updatePermissions(Request $request, $id) {
        $role = Role::findOrFail($id);

        $permissions=$request->permissions ?? [];

        $role->syncPermissions($permissions);

        return redirect() ->route('role.index') ->with('success', 'Permissions berhasil diperbarui');
    }

}
