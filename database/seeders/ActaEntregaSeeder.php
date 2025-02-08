<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActaEntregaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('actas_entrega')->insert([
            [
                'migrante_id' => 1,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'migrante_id' => 2,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'migrante_id' => 3,
                'created_by' => 2,
                'deleted_by' => 1,
                'updated_by' => 2,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(1),
                'deleted_at' => now()->subDay(),
            ],
            [
                'migrante_id' => 1,
                'created_by' => 3,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
                'deleted_at' => null,
            ],
        ]);
    }
}
