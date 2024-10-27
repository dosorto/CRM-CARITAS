<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('categorias')->insert([
            ['nombre_categoria' => 'Aparato Eléctrico'],
            ['nombre_categoria' => 'Mueble']
        ]);
    }
}