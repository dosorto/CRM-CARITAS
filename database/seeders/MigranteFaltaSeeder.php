<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigranteFaltaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('migrantes_faltas')->insert([
            // Migrante 1
            [
                'migrante_id' => 1,
                'falta_id' => 1, // Falta leve
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'migrante_id' => 1,
                'falta_id' => 2, // Falta grave
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Migrante 2
            [
                'migrante_id' => 2,
                'falta_id' => 3, // Falta muy grave
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
