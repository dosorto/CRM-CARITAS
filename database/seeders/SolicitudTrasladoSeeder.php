<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitudTrasladoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('solicitudes_traslado')->insert([
            [
                'solicitante_id' => 1,
                'aprobador_id' => 2,
                'firmado' => true,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitante_id' => 3,
                'aprobador_id' => 4,
                'firmado' => false,
                'created_by' => 3,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitante_id' => 2,
                'aprobador_id' => 5,
                'firmado' => true,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitante_id' => 5,
                'aprobador_id' => 1,
                'firmado' => false,
                'created_by' => 5,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);        
    }
}
