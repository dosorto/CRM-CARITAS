<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaltasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gravedades = [
            ['gravedad_falta' => 'Leve'],
            ['gravedad_falta' => 'Grave'],
            ['gravedad_falta' => 'Muy Grave'],
        ];

        foreach ($gravedades as $gravedad) {
            DB::table('gravedades_faltas')->insert(array_merge($gravedad, ['created_by' => 1]));
        }

        $faltas = [
            ['falta' => 'Disturbio', 'gravedad_falta_id' => 1],
            ['falta' => 'Robo', 'gravedad_falta_id' => 2],
            ['falta' => 'Violencia Física', 'gravedad_falta_id' => 3],
        ];

        foreach ($faltas as $falta) {
            DB::table('faltas')->insert(array_merge($falta, ['created_by' => 1]));
        }
    }
}
