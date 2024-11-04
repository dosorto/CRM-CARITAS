<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articulos')->insert([
            [
                'nombre' => 'Pasta Dental grande',
                'descripcion' => 'Pasta dental marca Colgate ',
                'codigo_barra' => '0123456789012',
                'cantidad_stock' => 110,
                'categoria_articulos_id' => 1
            ],

            [
                'nombre' => 'Cepillos de Dientes',
                'descripcion' => 'Cepillos de dientes para adultos  ',
                'codigo_barra' => '012345678967',
                'cantidad_stock' => 100,
                'categoria_articulos_id' => 1
            ],

            [
                'nombre' => 'Desodorantes',
                'descripcion' => 'Desodorantes para mujer',
                'codigo_barra' => '9012345678901',
                'cantidad_stock' => 60,
                'categoria_articulos_id' => 2
            ],

            [
                'nombre' => 'Jabones',
                'descripcion' => 'Jabones para uso personal',
                'codigo_barra' => '012345689012',
                'cantidad_stock' => 110,
                'categoria_articulos_id' => 2
            ],

            [
                'nombre' => 'Shampoo',
                'descripcion' => 'Shampoo en bote pequeño',
                'codigo_barra' => '01234565766012',
                'cantidad_stock' => 70,
                'categoria_articulos_id' => 2
            ]
        ]);

    }
}
