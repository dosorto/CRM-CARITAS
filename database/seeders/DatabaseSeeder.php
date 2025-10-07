<?php

namespace Database\Seeders;

use Database\Seeders\Nuevos\NuevosPaises;
use Database\Seeders\Nuevos\NuevosMotivos;
use Database\Seeders\Nuevos\NuevasNecesidades;
use Database\Seeders\Nuevos\NuevasDiscapacidades;
use Database\Seeders\Nuevos\NuevosAsesores;
use Database\Seeders\Nuevos\NuevasFronteras;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // echo (getcwd() . '\database\seeders\data\migrantes_table.csv');
        $this->call([

            // Dev Fresh Seeders
            RoleSeeder::class,
            PaisSeeder::class,
            PermissionSeeder::class,
            AsesorMigratorioSeeder::class,
            DepartamentoSeeder::class,
            CiudadSeeder::class,
            DiscapacidadSeeder::class,
            // EncuestasSeeder::class,
            // FaltasSeeder::class,
            FronteraSeeder::class,
            MotivoSalidaPaisSeeder::class,
            NecesidadSeeder::class,
            SituacionMigratoriaSeeder::class,

            // Excel Seeders
            NuevosPaises::class,
            NuevosMotivos::class,
            NuevasNecesidades::class,
            NuevasDiscapacidades::class,
            NuevosAsesores::class,
            NuevasFronteras::class,

            ExcelSeeder::class,
        ]);
    }
}
