<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaArticuloSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categoria_articulos')->insert([
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
        ]);
    }
}
