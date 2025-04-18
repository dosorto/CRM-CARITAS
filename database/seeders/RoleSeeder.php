<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $admin = Role::create(['name' => 'admin']);
        $admin = Role::where('name', 'admin')->first();

        $permissions = Permission::all();

        $admin->syncPermissions($permissions);
    }
}
