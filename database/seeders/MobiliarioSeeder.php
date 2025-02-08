<?php

namespace Database\Seeders;

use App\Models\Mobiliario;
use Illuminate\Database\Seeder;

class MobiliarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mobiliarios = [

            // DB::table('mobiliarios')->insert([
            [
                'nombre_mobiliario' => 'Televisor',
                'descripcion' => 'Televisor LG LCD 32 pulg',
                'codigo' => 'PSCCH-000001',
                'estado' => 'Bueno',
                'ubicacion' => 'Bodega',
                'subcategoria_id' => 1,
                'created_by' => 1
            ],

            [
                'nombre_mobiliario' => 'Sintonizador de Televisor',
                'descripcion' => 'Sintonizador de T.V digital marca TENKO',
                'codigo' => 'PSCCH-000002',
                'estado' => 'Bueno',
                'ubicacion' => 'Bodega',
                'subcategoria_id' => 2,
                'created_by' => 1
            ],


            [
                'nombre_mobiliario' => 'Estufa Eléctrica',
                'descripcion' => 'Estufa eléctrica gris de cuatro quemadores',
                'codigo' => 'PSCCH-000003',
                'estado' => 'Bueno',
                'ubicacion' => 'Bodega',
                'subcategoria_id' => 3,
                'created_by' => 1
            ],


            [
                'nombre_mobiliario' => 'Ventilador',
                'descripcion' => 'Ventilador gris',
                'codigo' => 'PSCCH-000004',
                'estado' => 'Bueno',
                'ubicacion' => 'Bodega',
                'subcategoria_id' => 4,
                'created_by' => 1
            ],

            [
                'nombre_mobiliario' => 'Mesa',
                'descripcion' => 'Mesa grande de comedor, color roble oscuro',
                'codigo' => 'PSCCH-000005',
                'estado' => 'Bueno',
                'ubicacion' => 'Bodega',
                'subcategoria_id' => 5,
                'created_by' => 1
            ],

            [
                'nombre_mobiliario' => 'Estante',
                'descripcion' => 'Estante de cocina',
                'codigo' => 'PSCCH-000006',
                'estado' => 'Bueno',
                'ubicacion' => 'Bodega',
                'subcategoria_id' => 6,
                'created_by' => 1
            ],

            [
                'nombre_mobiliario' => 'Ropero',
                'descripcion' => 'Ropero Grande de Madera',
                'codigo' => 'PSCCH-000007',
                'estado' => 'Bueno',
                'ubicacion' => 'Bodega',
                'subcategoria_id' => 7,
                'created_by' => 1
            ]
        ];

        foreach ($mobiliarios as $mob) {
            Mobiliario::create(
                array_merge($mob, [
                    'created_at' => now(),
                    'updated_at' => now()
                ])
            );
        }
    }
}
