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
            'nombre' => 'Sabas',
            'apellido' => 'Portillo',
            'identidad' => '0601198000315',
            'telefono' => '32906280',
            'fecha_nacimiento' => '1980-11-06',
            'estado_civil' => 'Soltero/a',
            'email' => 'sabas.portillo@unah.hn',
            'password' => Hash::make('123'),
            // 'empleado_id' => 2
        ]);
        User::create([
            'nombre' => 'Ingrid',
            'apellido' => 'Baquedano',
            'identidad' => '0000000000001',
            'telefono' => '32916050',
            'fecha_nacimiento' => '2000-11-06',
            'estado_civil' => 'Soltero/a',
            'email' => 'ibaquedano@unah.hn',
            'password' => Hash::make('123'),
            // 'empleado_id' => 2
        ]);

        User::create([
            'nombre' => 'Dacia',
            'apellido' => 'Espinoza',
            'identidad' => '0601200402937',
            'telefono' => '98319220',
            'fecha_nacimiento' => '2004-06-18',
            'estado_civil' => 'Soltero/a',
            'email' => 'dacia.espinoza@unah.hn',
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
