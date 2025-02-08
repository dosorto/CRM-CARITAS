<?php

namespace Database\Seeders;

use App\Models\CategoriaArticulo;
use Illuminate\Database\Seeder;

class CategoriaArticuloSeeder extends Seeder
{
    public function run(): void
    {
        $categoriaArticulos = [
            [
                'name_categoria' => 'Higiene Personal',
                'created_by' => 1
            ],
            [
                'name_categoria' => 'Limpieza General',
                'created_by' => 1
            ],
            [
                'name_categoria' => 'Productos de Belleza',
                'created_by' => 1
            ],
            [
                'name_categoria' => 'Cuidado Infantil',
                'created_by' => 1
            ],
            [
                'name_categoria' => 'Cuidado de la Salud',
                'created_by' => 1
            ],
        ];

        foreach ($categoriaArticulos as $categoria)
        {
            CategoriaArticulo::create($categoria);
        }
    }
}
