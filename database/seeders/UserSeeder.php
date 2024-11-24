<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ingrid',
            'email' => 'ibaquedano@unah.hn',
            'password' => Hash::make('123'),
            // 'empleado_id' => 2
        ]);
        User::create([
            'name' => 'fernanda',
            'email' => 'fsbetancourth@unah.hn',
            'password' => Hash::make('123'),
            // 'empleado_id' => 2
        ]);
        User::create([
            'name' => 'dacia',
            'email' => 'dacia.espinoza@unah.hn',
            'password' => Hash::make('123'),
            // 'empleado_id' => 2
        ]);
        User::create([
            'name' => 'jorlin',
            'email' => 'jorlin.rosa@unah.hn',
            'password' => Hash::make('123'),
            // 'empleado_id' => 2
        ]);
        User::create([
            'name' => 'cristhian',
            // No se si este es el correo: Magrio
            'email' => 'cavila@unah.hn',
            'password' => Hash::make('123'),
            // 'empleado_id' => 2
        ]);
        User::create([
            'name' => 'mario',
            'email' => 'mcarbajalg@unah.hn',
            'password' => Hash::make('123'),
            // 'empleado_id' => 2
        ]);

        $adminRole = Role::where('name', 'admin')->get()[0];
        $permissions = Permission::all();

        $adminRole->syncPermissions($permissions);

        $devs = User::all();

        foreach ($devs as $dev)
        {
            $dev->assignRole($adminRole);
        }

        // Seguir añadiendo usuarios...
    }
}
