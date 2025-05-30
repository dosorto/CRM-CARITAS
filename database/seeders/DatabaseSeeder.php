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
            PermissionSeeder::class,
            RoleSeeder::class,
            PaisSeeder::class,
            AsesorMigratorioSeeder::class,
            DepartamentoSeeder::class,
            CiudadSeeder::class,
            DiscapacidadSeeder::class,
            EncuestasSeeder::class,
            FaltasSeeder::class,
            FronteraSeeder::class,
            MotivoSalidaPaisSeeder::class,
            NecesidadSeeder::class,
            SituacionMigratoriaSeeder::class,
        ]);
    }
}
