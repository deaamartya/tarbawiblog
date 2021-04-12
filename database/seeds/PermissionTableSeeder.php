<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder {

    public function run() {
        $permissions = [
            'menu category-list',
            'menu category-create',
            'menu category-edit',
            'menu category-delete',
            'news-list',
            'news-create',
            'news-edit',
            'news-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }

}
