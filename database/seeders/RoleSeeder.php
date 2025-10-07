<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
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
        try {
            $admin = Role::create(['name' => 'admin']);
        } catch (Exception $e) {
            $admin = Role::where('name', 'admin')->first();
        }

        $permissions = Permission::all();

        $admin->syncPermissions($permissions);

        $user = User::create([
            'nombre' => 'Mario',
            'apellido' => 'Carbajal',
            'identidad' => '0601200303381',
            'telefono' => '97639800',
            'fecha_nacimiento' => '2003-09-02',
            'estado_civil' => 'Soltero',
            'email' => 'mcarbajalg@unah.hn',
            'email_verified_at' => now(),
            'password' => '123',
        ]);

        $user->assignRole($admin);
    }
}
