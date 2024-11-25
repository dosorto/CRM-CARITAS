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
            'Persecución política',
            'Mejor oportunidad de vida', 
            'Violencia y amenazas',
            'Pobreza',
            'Situación económica del país',
            'Problemas políticos',
            'Falta de empleo y oportunidades',
            'Crisis humanitaria',
            'Seguridad personal',
            'Reunificación familiar',
            'Corrupción del gobierno',
            'Violencia doméstica',
            'Desempleo',
            'Mejor futuro para la familia',
            'Conflicto armado',
            'Persecución religiosa',
            'Dictadura del gobierno',
            'Discriminación y homofobia',
            'Extorsión por grupos delictivos',
            'Situación crítica del país',
            'Escasez de alimentos',
            'Ayuda para la familia',
            'Problemas de salud',
            'Aspiración a mejores estudios y calidad de vida',
            'Problemas económicos'
        ];

        foreach ($motivos as $motivo) {
            DB::table('motivos_salida_pais')->insert([
                'motivo_salida_pais' => $motivo,
                'created_by' => 1
            ]);
        }
    }
}
