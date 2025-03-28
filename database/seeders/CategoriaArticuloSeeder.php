<?php

namespace Database\Seeders;

use App\Models\CategoriaArticulo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaArticuloSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categoria_articulos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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
                'name_categoria' => 'Cuidado Infantil',
                'created_by' => 1
            ],
            [
                'name_categoria' => 'Cuidado de la Salud',
                'created_by' => 1
            ],
        ];

        foreach ($categoriaArticulos as $categoria) {
            CategoriaArticulo::create($categoria);
        }
    }
}
