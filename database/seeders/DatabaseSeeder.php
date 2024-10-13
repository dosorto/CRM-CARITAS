<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;
use App\Models\Migrante;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\RoleSeeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
]       );

        // User::factory(10)->create();

        $this->call([

            RoleSeeder::class,

        ]);



        // Esto no se hace así, hay que hacer seeders y factories por cada modelo
        DB::table('gravedad_faltas')->insert(['gravedad_falta' => 'Muy Grave', 'nivel_gravedad' => '3']);
        DB::table('gravedad_faltas')->insert(['gravedad_falta' => 'Grave', 'nivel_gravedad' => '2']);
        DB::table('gravedad_faltas')->insert(['gravedad_falta' => 'Leve', 'nivel_gravedad' => '1']);

        DB::table('faltas_disciplinarias')->insert(['falta_disciplinaria' => 'Robo a Mano Armada', 'gravedad_falta_id' => 1]);
        DB::table('faltas_disciplinarias')->insert(['falta_disciplinaria' => 'Mal Comportamiento', 'gravedad_falta_id' => 2]);
        DB::table('faltas_disciplinarias')->insert(['falta_disciplinaria' => 'Desvelo', 'gravedad_falta_id' => 3]);

        // aqui mio xd

        $role1 = Role::create(['name' => 'Administrador']);
        Permission::create(['name' => 'Administrador'])->assignRole($role1);

        $role = Role::find(1);




        DB::table('paises')->insert(['nombre_pais' => 'Honduras', 'codigo_alfa3' => 'HND', 'codigo_numerico' => '340']);
        DB::table('paises')->insert(['nombre_pais' => 'Venezuela', 'codigo_alfa3' => 'VEN', 'codigo_numerico' => '862']);
        DB::table('paises')->insert(['nombre_pais' => 'Colombia', 'codigo_alfa3' => 'COL', 'codigo_numerico' => '170']);

        DB::table('departamentos')->insert(['nombre_departamento' => 'Choluteca', 'codigo_departamento' => 'HN-CH', 'pais_id' => 1]);
        DB::table('departamentos')->insert(['nombre_departamento' => 'Machiques', 'codigo_departamento' => '0263', 'pais_id' => 2]);
        DB::table('departamentos')->insert(['nombre_departamento' => 'Atlántico', 'codigo_departamento' => '08', 'pais_id' => 3]);

        DB::table('ciudades')->insert(['nombre_ciudad' => 'Choluteca', 'departamento_id' => 1]);
        DB::table('ciudades')->insert(['nombre_ciudad' => 'Perijá', 'departamento_id' => 2]);
        DB::table('ciudades')->insert(['nombre_ciudad' => 'Barranquilla', 'departamento_id' => 3]);

        Migrante::factory(30)->create();

        Empleado::create([
            'nombre' => 'Mario',
            'apellido' => 'Carbajal',
            'identidad' => '0000-0000-00000',
            'telefono' => '0000-0000',
            'fecha_nacimiento' => '1995-01-01',
            'estado_civil' => 'Soltero',
            'departamento_id'=> 1
        ]);
        Empleado::create([
            'nombre' => 'Ingrid ',
            'apellido' => 'Baquedano',
            'identidad' => '0091-0001-01000',
            'telefono' => '0000-0001',
            'fecha_nacimiento' => '1997-01-01',
            'estado_civil' => 'Soltero',
            'departamento_id'=> 2
        ]);


        User::factory()->create([
            'name' => 'Mario',
            'email' => 'mcarbajalg@unah.hn',
            'empleado_id' => 1
        ]);
        User::create([
            'name' => 'ibaquedano',
            'email' => 'ibaquedano@unah.hn',
            'password' => Hash::make('12345678'),
            'empleado_id' => 2
        ])->assignRole($role);
    }
}
