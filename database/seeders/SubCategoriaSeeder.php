<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategoria;
use Illuminate\Support\Facades\DB;

class SubCategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $subcategorias = [
            // DB::table('subcategorias')->insert([
            // Subcategorías para "Aparato Eléctrico"
            [
                'nombre_subcategoria' => 'Televisión',
                'categoria_id' => 1, // ID de "Aparato Eléctrico"
                'created_by' => 1,
            ],
            [
                'nombre_subcategoria' => 'Refrigerador',
                'categoria_id' => 1,
                'created_by' => 1,
            ],

            // Subcategorías para "Mueble"
            [
                'nombre_subcategoria' => 'Silla',
                'categoria_id' => 2, // ID de "Mueble"
                'created_by' => 1,
            ],
            [
                'nombre_subcategoria' => 'Mesa',
                'categoria_id' => 2,
                'created_by' => 1,
            ],

            // Subcategorías para "Herramienta"
            [
                'nombre_subcategoria' => 'Martillo',
                'categoria_id' => 3, // ID de "Herramienta"
                'created_by' => 1,
            ],
            [
                'nombre_subcategoria' => 'Destornillador',
                'categoria_id' => 3,
                'created_by' => 1,
            ],

            // Subcategorías para "Decoración"
            [
                'nombre_subcategoria' => 'Cuadro',
                'categoria_id' => 4, // ID de "Decoración"
                'created_by' => 1,
            ],
            [
                'nombre_subcategoria' => 'Florero',
                'categoria_id' => 4,
                'created_by' => 1,
            ],

            // Subcategorías para "Accesorios de Oficina"
            [
                'nombre_subcategoria' => 'Lapicero',
                'categoria_id' => 5, // ID de "Accesorios de Oficina"
                'created_by' => 1,
            ],
            [
                'nombre_subcategoria' => 'Engrapadora',
                'categoria_id' => 5,
                'created_by' => 1,
            ],
        ];

        foreach ($subcategorias as $subcategoria) {
            SubCategoria::create(array_merge($subcategoria, [
                'created_at' => now(),
                'updated_at' => now()
            ]));
        }
    }
}
