<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivoSalidaPaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $motivos = [
            ['id' => 1, 'motivo_salida_pais' => 'Problemas económicos'],
            ['id' => 2, 'motivo_salida_pais' => 'Persecución política'],
            ['id' => 3, 'motivo_salida_pais' => 'Mejor oportunidad de vida'],
            ['id' => 4, 'motivo_salida_pais' => 'Violencia y amenazas'],
            ['id' => 5, 'motivo_salida_pais' => 'Pobreza'],
            ['id' => 6, 'motivo_salida_pais' => 'Situación económica del país'],
            ['id' => 7, 'motivo_salida_pais' => 'Problemas políticos'],
            ['id' => 8, 'motivo_salida_pais' => 'Falta de empleo y oportunidades'],
            ['id' => 9, 'motivo_salida_pais' => 'Crisis humanitaria'],
            ['id' => 10, 'motivo_salida_pais' => 'Seguridad personal'],
            ['id' => 11, 'motivo_salida_pais' => 'Reunificación familiar'],
            ['id' => 12, 'motivo_salida_pais' => 'Corrupción del gobierno'],
            ['id' => 13, 'motivo_salida_pais' => 'Violencia doméstica'],
            ['id' => 14, 'motivo_salida_pais' => 'Desempleo'],
            ['id' => 15, 'motivo_salida_pais' => 'Mejor futuro para la familia'],
            ['id' => 16, 'motivo_salida_pais' => 'Conflicto armado'],
            ['id' => 17, 'motivo_salida_pais' => 'Persecución religiosa'],
            ['id' => 18, 'motivo_salida_pais' => 'Dictadura del gobierno'],
            ['id' => 19, 'motivo_salida_pais' => 'Discriminación y homofobia'],
            ['id' => 20, 'motivo_salida_pais' => 'Extorsión por grupos delictivos'],
            ['id' => 21, 'motivo_salida_pais' => 'Situación crítica del país'],
            ['id' => 22, 'motivo_salida_pais' => 'Escasez de alimentos'],
            ['id' => 23, 'motivo_salida_pais' => 'Ayuda para la familia'],
            ['id' => 24, 'motivo_salida_pais' => 'Problemas de salud'],
            ['id' => 25, 'motivo_salida_pais' => 'Aspiración a mejores estudios y calidad de vida'],
        ];

        DB::table('motivos_salida_pais')->insert($motivos);
    }
}
