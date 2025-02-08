<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleSolicitudInsumosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('detalles_solicitud_insumos')->insert([
            // Detalles para solicitud_insumos_id = 1
            [
                'solicitud_insumos_id' => 1,
                'articulo_id' => 1,
                'cantidad' => 10,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_insumos_id' => 1,
                'articulo_id' => 2,
                'cantidad' => 5,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_insumos_id' => 1,
                'articulo_id' => 3,
                'cantidad' => 8,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],

            // Detalles para solicitud_insumos_id = 2
            [
                'solicitud_insumos_id' => 2,
                'articulo_id' => 4,
                'cantidad' => 12,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_insumos_id' => 2,
                'articulo_id' => 5,
                'cantidad' => 7,
                'created_by' => 3,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_insumos_id' => 2,
                'articulo_id' => 6,
                'cantidad' => 15,
                'created_by' => 3,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],

            // Detalles para solicitud_insumos_id = 3
            [
                'solicitud_insumos_id' => 3,
                'articulo_id' => 7,
                'cantidad' => 9,
                'created_by' => 4,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_insumos_id' => 3,
                'articulo_id' => 8,
                'cantidad' => 6,
                'created_by' => 4,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_insumos_id' => 3,
                'articulo_id' => 9,
                'cantidad' => 10,
                'created_by' => 5,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],

            // Detalles para solicitud_insumos_id = 4
            [
                'solicitud_insumos_id' => 4,
                'articulo_id' => 10,
                'cantidad' => 11,
                'created_by' => 5,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_insumos_id' => 4,
                'articulo_id' => 1,
                'cantidad' => 4,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'solicitud_insumos_id' => 4,
                'articulo_id' => 3,
                'cantidad' => 7,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
