<?php

namespace App\Http\Controllers\Admins\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller {

    public function index() {
        $data = Role::all();
        $view['data'] = $data;

        return view('backend.menu.management.manage_role.list', $view);
    }

    public function create() {
        $data = Permission::get();
        $view['data'] = $data;

        return view('backend.menu.management.manage_role.add', $view);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('role.index')->with('success', 'Role created successfully');
    }

    public function edit($id) {
        $role = Role::find($id);
        $view['role'] = $role;

        $permission = Permission::get();
        $view['permission'] = $permission;

        $rolePermissions = DB::table("role_has_permissions")
                ->where("role_has_permissions.role_id", $id)
                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                ->all();
        $view['rolePermissions'] = $rolePermissions;


        return view('backend.menu.management.manage_role.edit', $view);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('role.index')->with('success', 'Role updated successfully');
    }

    public function destroy($id) {
        $category = Role::findOrFail($id);
        if ($category->delete()) {
            Session::flash('success', 'Category has been deleted');
        }
        return redirect()->back();
    }

}
