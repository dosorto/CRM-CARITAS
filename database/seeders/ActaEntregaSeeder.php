<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Articulo;

class ActaEntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Articulo::create([
            'nombre' => 'Cable Impresora',
            'descripcion' => 'cable de impresora de 2 metros',
            'codigo_barra' => '6957303828470',
            'cantidad_stock' => 10,
            'subcategoria_id' => 1,
        ]);

        Articulo::create([
            'nombre' => 'Kellogs Corn Flakes',
            'descripcion' => 'Corn Flakes de 150g',
            'codigo_barra' => '7501008101049',
            'cantidad_stock' => 30,
            'subcategoria_id' => 1,
        ]);

        Articulo::create([
            'nombre' => 'Resma de Papel Carta',
            'descripcion' => 'Premium Laser Paper',
            'codigo_barra' => '7891191002460',
            'cantidad_stock' => 5,
            'subcategoria_id' => 1,
        ]);
    }
}
