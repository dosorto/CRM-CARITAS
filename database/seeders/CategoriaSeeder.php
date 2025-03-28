<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categorias')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // $categorias = [
        //     'Aparato Eléctrico',
        //     'Mueble',
        //     'Herramienta',
        //     'Decoración',
        //     'Accesorios de Oficina',
        // ];

        // foreach ($categorias as $categoria) {
        //     Categoria::create([
        //         'nombre_categoria' => $categoria,
        //         'created_by' => 1,
        //     ]);
        // }
    }
}
