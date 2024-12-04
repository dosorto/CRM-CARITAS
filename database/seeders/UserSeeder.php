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
        ]);
        User::create([
            'nombre' => 'Fernanda',
            'apellido' => 'Betancourth',
            'identidad' => '0000000000002',
            'telefono' => '88241492',
            'fecha_nacimiento' => '2002-09-05',
            'estado_civil' => 'Soltero/a',
            'email' => 'fsbetancourth@unah.hn',
            'password' => Hash::make('123'),
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
        ]);
        User::create([
            'nombre' => 'Jorlin',
            'apellido' => 'Rosa',
            'identidad' => '0000000000004',
            'telefono' => '87368208',
            'fecha_nacimiento' => '2000-07-12',
            'estado_civil' => 'Soltero/a',
            'email' => 'jorlin.rosa@unah.hn',
            'password' => Hash::make('123'),
        ]);
        User::create([
            'nombre' => 'Cristhian',
            'apellido' => 'Ávila',
            'identidad' => '0000000000005',
            'telefono' => '8810-0306',
            'fecha_nacimiento' => '2000-01-01',
            'estado_civil' => 'Soltero/a',
            'email' => 'cavila@unah.hn',
            'password' => Hash::make('123'),
        ]);
        User::create([
            'nombre' => 'Mario',
            'apellido' => 'Carbajal',
            'identidad' => '0601200303381',
            'telefono' => '97639800',
            'fecha_nacimiento' => '2003-09-02',
            'estado_civil' => 'Soltero/a',
            'email' => 'mcarbajalg@unah.hn',
            'password' => Hash::make('123'),
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
        User::create([
            'nombre' => 'Dorian',
            'apellido' => 'Ordoñez',
            'identidad' => '038302029384',
            'telefono' => '87463552',
            'fecha_nacimiento' => '1990-09-02',
            'estado_civil' => 'Soltero/a',
            'email' => 'dosorto@unah.hn',
            'password' => Hash::make('123'),
        ]);

        $adminRole = Role::where('name', 'voluntario')->get()[0];
        $dorian = User::where('identidad', '038302029384')->get()[0];

        $adminRole->givePermissionTo('Administrar Paises');
        
        $dorian->assignRole('voluntario');
    }
}