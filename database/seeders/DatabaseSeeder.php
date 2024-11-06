<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Migrante;
use App\Models\SituacionMigratoria;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PaisSeeder::class,
            DepartamentoSeeder::class,
            CiudadSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CategoriaSeeder::class,
            SubCategoriaSeeder::class,
            MobiliarioSeeder::class,
            CategoriaArticuloSeeder::class,
            ArticuloSeeder::class,
            ActaEntregaSeeder::class,
            DiscapacidadSeeder::class,
            SituacionMigratoria::class,

        ]);

        Migrante::factory()->count(100)->create();


    }
}
