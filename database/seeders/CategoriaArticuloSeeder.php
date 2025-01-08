<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoria_articulos')->insert([
            [
                'name_categoria' => 'Higiene Personal',
                'created_by' => 1
            ],
            [
                'name_categoria' => 'Aseo del Cuerpo',
                'created_by' => 1
            ]
        ]);
    }
}
