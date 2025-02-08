<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonacionArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('donacion_articulo')->insert([
            // Donación de Fundación Ayuda Global
            [
                'id_donacion' => 1,
                'id_articulo' => 1, // Pasta Dental grande
                'cantidad_donada' => 100,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id_donacion' => 1,
                'id_articulo' => 2, // Cepillos de Dientes
                'cantidad_donada' => 150,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],

            // Donación de Gobierno de Honduras
            [
                'id_donacion' => 2,
                'id_articulo' => 3, // Desodorantes
                'cantidad_donada' => 200,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id_donacion' => 2,
                'id_articulo' => 4, // Jabones
                'cantidad_donada' => 300,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],

            // Donación de Juan Pérez
            [
                'id_donacion' => 3,
                'id_articulo' => 5, // Shampoo
                'cantidad_donada' => 80,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id_donacion' => 3,
                'id_articulo' => 6, // Pasta Dental
                'cantidad_donada' => 120,
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
