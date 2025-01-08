<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategorias = [
            ['nombre_subcategoria' => 'Televisor', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Sintonizador', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Estufa', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Ventilador', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Microonda', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Oasis', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Licuadora', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Lavadora', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Secadora', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Refrigeradora', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Percoladora', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Lámpara', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Megáfono', 'categoria_id' => 1],
            ['nombre_subcategoria' => 'Mesa', 'categoria_id' => 2],
            ['nombre_subcategoria' => 'Silla', 'categoria_id' => 2],
            ['nombre_subcategoria' => 'Estante', 'categoria_id' => 2],
            ['nombre_subcategoria' => 'Ropero', 'categoria_id' => 2],
            ['nombre_subcategoria' => 'Organizador', 'categoria_id' => 2],
            ['nombre_subcategoria' => 'Escritorio', 'categoria_id' => 2],
        ];

        foreach ($subcategorias as $subcategoria)
        {
            DB::table('subcategorias')->insert(array_merge($subcategoria, ['created_by' => 1]));
        }
    }
}
