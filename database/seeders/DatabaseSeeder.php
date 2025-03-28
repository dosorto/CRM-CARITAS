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

            // Ejecutados
            // -----------------------------------------
            // PaisSeeder::class,
            // DepartamentoSeeder::class,
            // CiudadSeeder::class,
            // DiscapacidadSeeder::class,
            // SituacionMigratoriaSeeder::class,
            // AsesorMigratorioSeeder::class,
            // FronteraSeeder::class,
            // MotivoSalidaPaisSeeder::class,
            // NecesidadSeeder::class,
            // FaltasSeeder::class,
            // -----------------------------------------

            // a truncar, revisar si ya se ejecutaron igual
            CategoriaSeeder::class,
            SubCategoriaSeeder::class,
            MobiliarioSeeder::class,
            ArticuloSeeder::class,
            DonanteSeeder::class,

            // a ejecutar
            CategoriaArticuloSeeder::class,
            EncuestasSeeder::class,

            // Revisar si ya se ejecutaron
            TipoDonanteSeeder::class,

            // Permisos y Usuarios
            PermissionSeeder::class,
            RoleSeeder::class,
            // UserSeeder::class,
        ]);
    }
}
