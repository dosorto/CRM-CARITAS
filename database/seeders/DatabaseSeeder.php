<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Migrante;

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
        ]);

        Migrante::factory()->count(30)->create();


    }
}
