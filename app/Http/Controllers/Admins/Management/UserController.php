<?php

namespace App\Http\Controllers\Admins\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller {

    public function index() {
        $data = User::all();
        $view['data'] = $data;

        return view('backend.menu.management.manage_user.list', $view);
    }

    public function create() {
        $data = Role::pluck('name', 'name')->all();
        $view['data'] = $data;

        return view('backend.menu.management.manage_user.add', $view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) { {
            $this->validate($request, [
                'name' => 'required',
                'username' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'roles' => 'required'
            ]);


            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $input['slug'] = str_replace(' ', '.', $request['username']);

            $user = User::create($input);
            $user->assignRole($request->input('roles'));

            return redirect()->route('user.index')->with('success', 'User created successfully');
        }
    }

    public function edit($id) {
        $user = User::find($id);
        $view['user'] = $user;

        $roles = Role::pluck('name', 'name')->all();
        $view['roles'] = $roles;

        $userRole = $user->roles->pluck('name', 'name')->all();
        $view['userRole'] = $userRole;

        return view('backend.menu.management.manage_user.edit', $view);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }


        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    public function destroy($id) {
        User::find($id)->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }

}
