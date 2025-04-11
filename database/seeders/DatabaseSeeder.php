<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            // Dev Seeders
            // -----------------------------------------
            PaisSeeder::class,
            DepartamentoSeeder::class,
            CiudadSeeder::class,
            DiscapacidadSeeder::class,
            SituacionMigratoriaSeeder::class,
            AsesorMigratorioSeeder::class,
            FronteraSeeder::class,
            MotivoSalidaPaisSeeder::class,
            NecesidadSeeder::class,
            FaltasSeeder::class,
            TipoDonanteSeeder::class,
            DonanteSeeder::class,
            EncuestasSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            // -----------------------------------------

        ]);
    }
}
