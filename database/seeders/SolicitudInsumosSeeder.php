<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitudInsumosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('solicitudes_insumos')->insert([
            [
                'user_id' => 1,
                'fecha' => now()->subDays(3)->toDateString(),
                'firmado' => true,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'user_id' => 2,
                'fecha' => now()->subDays(2)->toDateString(),
                'firmado' => false,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'user_id' => 3,
                'fecha' => now()->subDays(4)->toDateString(),
                'firmado' => true,
                'created_by' => 3,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'user_id' => 4,
                'fecha' => now()->subDays(1)->toDateString(),
                'firmado' => false,
                'created_by' => 4,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
