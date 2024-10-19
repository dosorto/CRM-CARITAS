<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Mobiliario;

class MobiliarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mobiliarios')->insert([
            ['nombre_mobiliario' => 'Cama', 'descripcion' => 'Cama de cuarto en buen estado', 'codigo_barra' => null, 'codigo' => 'CA-CC00001', 'estado' => 'Bueno', 'ubicacion' => 'Casa'],
            ['nombre_mobiliario' => 'Estufa', 'descripcion' => 'Estufa eléctrica de cuatro quemadores', 'codigo_barra' => null, 'codigo' => 'ES-CC00001', 'estado' => 'Bueno', 'ubicacion' => 'Casa'],
            ['nombre_mobiliario' => 'Mesa', 'descripcion' => 'Mesa de comedor para seis personas', 'codigo_barra' => null, 'codigo' => 'ME-CC00001', 'estado' => 'Bueno', 'ubicacion' => 'Casa'],
            ['nombre_mobiliario' => 'Televisor', 'descripcion' => 'Televisor de 42 pulgadas', 'codigo_barra' => null, 'codigo' => 'TE-CC00001', 'estado' => 'Bueno', 'ubicacion' => 'Casa'],
            ['nombre_mobiliario' => 'Sillón', 'descripcion' => 'Sillón reclinable de sala', 'codigo_barra' => null, 'codigo' => 'SI-CC00001', 'estado' => 'Bueno', 'ubicacion' => 'Casa'],
            ['nombre_mobiliario' => 'Refrigerador', 'descripcion' => 'Refrigerador grande con congelador', 'codigo_barra' => null, 'codigo' => 'RE-CC00001', 'estado' => 'Bueno', 'ubicacion' => 'Casa'],
            ['nombre_mobiliario' => 'Lámpara', 'descripcion' => 'Lámpara de mesa', 'codigo_barra' => null, 'codigo' => 'LA-CC00001', 'estado' => 'Bueno', 'ubicacion' => 'Casa']
        ]);
    }
}
