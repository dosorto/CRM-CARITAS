<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Aparato Eléctrico',
            'Mueble',
            'Herramienta',
            'Decoración',
            'Accesorios de Oficina',
        ];

        foreach ($categorias as $categoria) {
            Categoria::create([
                'nombre_categoria' => $categoria,
                'created_by' => 1,
            ]);
        }
    }
}
