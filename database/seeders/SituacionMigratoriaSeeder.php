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
            'Migrante en tránsito',
            'Protección Internacional',
            'Retornado',
            'Solicitante de asilo',
            'Desplazado por violencia interna',
            'Refugiado',
        ];

        foreach ($situacionesMigratorias as $situacion) {
            DB::table('situaciones_migratorias')->insert([
                'situacion_migratoria' => $situacion,
                'created_by' => 1
            ]);
        }
    }
}
