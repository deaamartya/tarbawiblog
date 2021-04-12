<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Users\User;

class AdminTableSeeder extends Seeder {

    public function run() {
        $user = User::create([
                    'username' => 'embong15',
                    'name' => 'mr.embong',
                    'slug' => 'mr-embong',
                    'email' => 'admin@admin.com',
                    'i_am' => true,
                    'status' => true,
                    'password' => bcrypt('password')
        ]);

        $role = Role::create(['name' => 'Manager']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }

}
