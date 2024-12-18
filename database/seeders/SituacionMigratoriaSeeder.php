<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacionMigratoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $situacionesMigratorias = [
            'N/A',
            'Migrante en Tránsito',
            'Protección Internacional',
            'Retornado',
            'Solicitante de Asilo',
            'Desplazado por Violencia Interna',
            'Refugiado',
        ];

        foreach ($situacionesMigratorias as $situacion) {
            DB::table('situaciones_migratorias')->insert([
                'situacion_migratoria' => $situacion,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
