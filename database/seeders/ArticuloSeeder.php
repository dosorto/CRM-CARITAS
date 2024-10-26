<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\SubCategoria;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Higiene Personal'
        ]);

        SubCategoria::create([
            'nombre' => 'Aseo Bucal',
            'categoria_id' => '1'
        ]);

        SubCategoria::create([
            'nombre' => 'Productos de Baño',
            'categoria_id' => '1'
        ]);



        Articulo::create([
            'nombre' => 'Pasta Dental grande',
            'descripcion' => 'Pasta dental marca Colgate ',
            'codigo_barra' => '0123456789012',
            'cantidad_stock' => 110,
            'subcategoria_id' => 1,
        ]);

        Articulo::create([
            'nombre' => 'Cepillos de Dientes',
            'descripcion' => 'Cepillos de dientes para adultos  ',
            'codigo_barra' => '012345678967',
            'cantidad_stock' => 100,
            'subcategoria_id' => 1,
        ]);

        Articulo::create([
            'nombre' => 'Desodorantes',
            'descripcion' => 'Desodorantes para mujer',
            'codigo_barra' => '9012345678901',
            'cantidad_stock' => 60,
            'subcategoria_id' => 2,
        ]);

        Articulo::create([
            'nombre' => 'Jabones',
            'descripcion' => 'Jabones para uso personal',
            'codigo_barra' => '0123456789012',
            'cantidad_stock' => 110,
            'subcategoria_id' => 2,
        ]);

        Articulo::create([
            'nombre' => 'Shampoo',
            'descripcion' => 'Shampoo en bote pequeño',
            'codigo_barra' => '0123456569012',
            'cantidad_stock' => 70,
            'subcategoria_id' => 2,
        ]);
    }
}
