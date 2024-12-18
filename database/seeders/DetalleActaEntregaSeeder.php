<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleActaEntregaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('detalles_acta_entrega')->insert([
            // Detalles para el acta_entrega_id = 1
            [
                'acta_entrega_id' => 1,
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
                'acta_entrega_id' => 1,
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
                'acta_entrega_id' => 1,
                'articulo_id' => 3,
                'cantidad' => 8,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
                'deleted_at' => null,
            ],
            [
                'acta_entrega_id' => 1,
                'articulo_id' => 4,
                'cantidad' => 12,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
                'deleted_at' => null,
            ],
            [
                'acta_entrega_id' => 1,
                'articulo_id' => 5,
                'cantidad' => 7,
                'created_by' => 3,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],

            // Detalles para el acta_entrega_id = 2
            [
                'acta_entrega_id' => 2,
                'articulo_id' => 6,
                'cantidad' => 15,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'acta_entrega_id' => 2,
                'articulo_id' => 7,
                'cantidad' => 9,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'acta_entrega_id' => 2,
                'articulo_id' => 8,
                'cantidad' => 6,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
                'deleted_at' => null,
            ],
            [
                'acta_entrega_id' => 2,
                'articulo_id' => 9,
                'cantidad' => 10,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
                'deleted_at' => null,
            ],
            [
                'acta_entrega_id' => 2,
                'articulo_id' => 10,
                'cantidad' => 11,
                'created_by' => 3,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],

            // Detalles para el acta_entrega_id = 3
            [
                'acta_entrega_id' => 3,
                'articulo_id' => 1,
                'cantidad' => 20,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'acta_entrega_id' => 3,
                'articulo_id' => 3,
                'cantidad' => 13,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'acta_entrega_id' => 3,
                'articulo_id' => 5,
                'cantidad' => 10,
                'created_by' => 2,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
                'deleted_at' => null,
            ],
            [
                'acta_entrega_id' => 3,
                'articulo_id' => 7,
                'cantidad' => 18,
                'created_by' => 3,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'acta_entrega_id' => 3,
                'articulo_id' => 9,
                'cantidad' => 14,
                'created_by' => 3,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}