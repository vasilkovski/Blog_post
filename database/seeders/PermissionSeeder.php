<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);

        $p1 = Permission::create(['name' => 'view_admin']);
        $p2 = Permission::create(['name' => 'view_user']);
        $admin = Role::findByName('Admin');
        $user = Role::findByName('User');
        $admin->givePermissionTo([$p1,$p2]);
        $user->givePermissionTo($p2);
    }
}
