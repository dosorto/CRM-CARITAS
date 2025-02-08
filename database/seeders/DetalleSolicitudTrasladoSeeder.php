<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleSolicitudTrasladoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detalles_solicitud_traslado')->insert([
            // Detalles para solicitud_traslado_id = 1
            [
                'solicitud_traslado_id' => 1,
                'mobiliario_id' => 1,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_traslado_id' => 1,
                'mobiliario_id' => 2,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],

            // Detalles para solicitud_traslado_id = 2
            [
                'solicitud_traslado_id' => 2,
                'mobiliario_id' => 3,
                'created_by' => 3,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_traslado_id' => 2,
                'mobiliario_id' => 4,
                'created_by' => 3,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],

            // Detalles para solicitud_traslado_id = 3
            [
                'solicitud_traslado_id' => 3,
                'mobiliario_id' => 5,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_traslado_id' => 3,
                'mobiliario_id' => 6,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],

            // Detalles para solicitud_traslado_id = 4
            [
                'solicitud_traslado_id' => 4,
                'mobiliario_id' => 7,
                'created_by' => 5,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_traslado_id' => 4,
                'mobiliario_id' => 6,
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
