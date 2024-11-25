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
                'codigo_barra' => '012345678012',
                'cantidad_stock' => 110,
                'es_insumo' => 0,
                'categoria_articulos_id' => 1
            ],

            [
                'nombre' => 'Cepillos de Dientes',
                'descripcion' => 'Cepillos de dientes para adultos  ',
                'codigo_barra' => '016346739012',
                'cantidad_stock' => 100,
                'es_insumo' => 0,
                'categoria_articulos_id' => 1
            ],

            [
                'nombre' => 'Desodorantes',
                'descripcion' => 'Desodorantes para mujer',
                'codigo_barra' => '012345589012',
                'cantidad_stock' => 60,
                'es_insumo' => 0,
                'categoria_articulos_id' => 2
            ],

            [
                'nombre' => 'Jabones',
                'descripcion' => 'Jabones para uso personal',
                'codigo_barra' => '012342170002',
                'cantidad_stock' => 110,
                'es_insumo' => 1,
                'categoria_articulos_id' => 2,
            ],

            [
                'nombre' => 'Shampoo',
                'descripcion' => 'Shampoo en bote pequeÃ±o',
                'codigo_barra' => '012222780002',
                'cantidad_stock' => 70,
                'es_insumo' => 1,
                'categoria_articulos_id' => 2,
            ]
        ]);

    }
}
