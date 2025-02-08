<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articulos = [
            [
                'nombre' => 'Pasta Dental grande',
                'descripcion' => 'Pasta dental marca Colgate ',
                'codigo_barra' => '012345678012',
                'cantidad_stock' => 110,
                'es_insumo' => 0,
                'categoria_articulos_id' => 1,
                'created_by' => 1
            ],

            [
                'nombre' => 'Cepillos de Dientes',
                'descripcion' => 'Cepillos de dientes para adultos  ',
                'codigo_barra' => '016346739012',
                'cantidad_stock' => 100,
                'es_insumo' => 0,
                'categoria_articulos_id' => 1,
                'created_by' => 1
            ],

            [
                'nombre' => 'Desodorantes',
                'descripcion' => 'Desodorantes para mujer',
                'codigo_barra' => '012345589012',
                'cantidad_stock' => 60,
                'es_insumo' => 0,
                'categoria_articulos_id' => 2,
                'created_by' => 1
            ],

            [
                'nombre' => 'Jabones',
                'descripcion' => 'Jabones para uso personal',
                'codigo_barra' => '012342170002',
                'cantidad_stock' => 110,
                'es_insumo' => 1,
                'categoria_articulos_id' => 2,
                'created_by' => 1
            ],

            [
                'nombre' => 'Shampoo',
                'descripcion' => 'Shampoo para todo tipo de cabello',
                'codigo_barra' => '012345678901',
                'cantidad_stock' => 80,
                'es_insumo' => 0,
                'categoria_articulos_id' => 3,
                'created_by' => 1
            ],

            [
                'nombre' => 'Pasta Dental',
                'descripcion' => 'Pasta dental con flúor para protección completa',
                'codigo_barra' => '012349876543',
                'cantidad_stock' => 50,
                'es_insumo' => 1,
                'categoria_articulos_id' => 2,
                'created_by' => 1
            ],

            [
                'nombre' => 'Crema Corporal',
                'descripcion' => 'Crema hidratante para piel seca',
                'codigo_barra' => '012341234567',
                'cantidad_stock' => 120,
                'es_insumo' => 0,
                'categoria_articulos_id' => 4,
                'created_by' => 1
            ],

            [
                'nombre' => 'Toallas Húmedas',
                'descripcion' => 'Toallas húmedas para uso personal',
                'codigo_barra' => '012347654321',
                'cantidad_stock' => 200,
                'es_insumo' => 1,
                'categoria_articulos_id' => 5,
                'created_by' => 1
            ],

            [
                'nombre' => 'Gel Antibacterial',
                'descripcion' => 'Gel antibacterial en presentación de bolsillo',
                'codigo_barra' => '012345432109',
                'cantidad_stock' => 150,
                'es_insumo' => 1,
                'categoria_articulos_id' => 5,
                'created_by' => 1
            ],

            [
                'nombre' => 'Toalla de Algodón',
                'descripcion' => 'Toalla suave para uso personal',
                'codigo_barra' => '019283746512',
                'cantidad_stock' => 90,
                'es_insumo' => 0,
                'categoria_articulos_id' => 5,
                'created_by' => 1
            ],
            [
                'nombre' => 'Esponja de Baño',
                'descripcion' => 'Esponja exfoliante para la piel',
                'codigo_barra' => '029384756123',
                'cantidad_stock' => 120,
                'es_insumo' => 0,
                'categoria_articulos_id' => 5,
                'created_by' => 1
            ],
            [
                'nombre' => 'Alcohol en Gel',
                'descripcion' => 'Alcohol en gel con aroma a limón',
                'codigo_barra' => '012348765432',
                'cantidad_stock' => 180,
                'es_insumo' => 1,
                'categoria_articulos_id' => 5,
                'created_by' => 1
            ],
            [
                'nombre' => 'Paquete de Algodón',
                'descripcion' => 'Bolsa de algodón para limpieza facial',
                'codigo_barra' => '034567892123',
                'cantidad_stock' => 70,
                'es_insumo' => 1,
                'categoria_articulos_id' => 4,
                'created_by' => 1
            ],
            [
                'nombre' => 'Desinfectante Multiusos',
                'descripcion' => 'Desinfectante líquido para superficies',
                'codigo_barra' => '043215678902',
                'cantidad_stock' => 100,
                'es_insumo' => 1,
                'categoria_articulos_id' => 2,
                'created_by' => 1
            ],
            [
                'nombre' => 'Perfume Corporal',
                'descripcion' => 'Perfume para uso diario, aroma floral',
                'codigo_barra' => '054326789012',
                'cantidad_stock' => 50,
                'es_insumo' => 0,
                'categoria_articulos_id' => 3,
                'created_by' => 1
            ],
            [
                'nombre' => 'Crema de Manos',
                'descripcion' => 'Crema hidratante para cuidado de manos',
                'codigo_barra' => '065437890123',
                'cantidad_stock' => 80,
                'es_insumo' => 0,
                'categoria_articulos_id' => 4,
                'created_by' => 1
            ],
            [
                'nombre' => 'Cera para Cabello',
                'descripcion' => 'Cera moldeadora para peinados',
                'codigo_barra' => '076548901234',
                'cantidad_stock' => 65,
                'es_insumo' => 0,
                'categoria_articulos_id' => 3,
                'created_by' => 1
            ],
            [
                'nombre' => 'Ambientador',
                'descripcion' => 'Spray ambientador para el hogar',
                'codigo_barra' => '087659012345',
                'cantidad_stock' => 90,
                'es_insumo' => 0,
                'categoria_articulos_id' => 5,
                'created_by' => 1
            ],
            [
                'nombre' => 'Mascarilla Facial',
                'descripcion' => 'Mascarilla facial hidratante de aloe vera',
                'codigo_barra' => '098760123456',
                'cantidad_stock' => 30,
                'es_insumo' => 0,
                'categoria_articulos_id' => 4,
                'created_by' => 1
            ],
        ];

        foreach ($articulos as $articulo) {
            Articulo::create($articulo);
        }
    }
}
