<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpedienteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('expedientes')->insert([
            [
                'migrante_id' => 1,
                'frontera_id' => 1,
                'asesor_migratorio_id' => 1,
                'situacion_migratoria_id' => 1,
                'observacion' => 'Migrante en buen estado de salud.',
                'fallecimiento' => false,
                'fecha_salida' => null,
                'atencion_psicologica' => false,
                'asesoria_psicologica' => false,
                'atencion_legal' => true,
                'asesoria_psicosocial' => true,
                'created_by' => 1,
            ],
            [
                'migrante_id' => 2,
                'frontera_id' => 2,
                'asesor_migratorio_id' => 2,
                'situacion_migratoria_id' => 2,
                'observacion' => 'Requiere atención médica.',
                'fallecimiento' => false,
                'fecha_salida' => '2024-12-15',
                'atencion_psicologica' => true,
                'asesoria_psicologica' => true,
                'atencion_legal' => false,
                'asesoria_psicosocial' => false,
                'created_by' => 1,
            ],
            [
                'migrante_id' => 3,
                'frontera_id' => 3,
                'asesor_migratorio_id' => 3,
                'situacion_migratoria_id' => 3,
                'observacion' => 'Migrante acompañado de menores.',
                'fallecimiento' => false,
                'fecha_salida' => null,
                'atencion_psicologica' => false,
                'asesoria_psicologica' => true,
                'atencion_legal' => true,
                'asesoria_psicosocial' => true,
                'created_by' => 1,
            ],
        ]);


        DB::table('expedientes_motivos_salida_pais')->insert([
            // Expediente 1
            [
                'expediente_id' => 1,
                'motivo_salida_pais_id' => 1, // Motivo 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 1,
                'motivo_salida_pais_id' => 5, // Motivo 5
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Expediente 2
            [
                'expediente_id' => 2,
                'motivo_salida_pais_id' => 3, // Motivo 3
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 2,
                'motivo_salida_pais_id' => 8, // Motivo 8
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Expediente 3
            [
                'expediente_id' => 3,
                'motivo_salida_pais_id' => 2, // Motivo 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 3,
                'motivo_salida_pais_id' => 7, // Motivo 7
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('expedientes_necesidades')->insert([
            // Expediente 1
            [
                'expediente_id' => 1,
                'necesidad_id' => 1, // Necesidad 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 1,
                'necesidad_id' => 3, // Necesidad 3
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 1,
                'necesidad_id' => 5, // Necesidad 5
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Expediente 2
            [
                'expediente_id' => 2,
                'necesidad_id' => 2, // Necesidad 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 2,
                'necesidad_id' => 4, // Necesidad 4
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 2,
                'necesidad_id' => 6, // Necesidad 6
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Expediente 3
            [
                'expediente_id' => 3,
                'necesidad_id' => 1, // Necesidad 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 3,
                'necesidad_id' => 3, // Necesidad 3
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 3,
                'necesidad_id' => 7, // Necesidad 7
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('expedientes_situaciones_migratorias')->insert([
            // Expediente 1
            [
                'expediente_id' => 1,
                'situacion_migratoria_id' => 1, // Situación migratoria 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 1,
                'situacion_migratoria_id' => 3, // Situación migratoria 3
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Expediente 2
            [
                'expediente_id' => 2,
                'situacion_migratoria_id' => 2, // Situación migratoria 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 2,
                'situacion_migratoria_id' => 4, // Situación migratoria 4
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Expediente 3
            [
                'expediente_id' => 3,
                'situacion_migratoria_id' => 5, // Situación migratoria 5
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 3,
                'situacion_migratoria_id' => 6, // Situación migratoria 6
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('expedientes_discapacidades')->insert([
            // Expediente 1
            [
                'expediente_id' => 1,
                'discapacidad_id' => 1, // Discapacidad 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 1,
                'discapacidad_id' => 4, // Discapacidad 4
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Expediente 2
            [
                'expediente_id' => 2,
                'discapacidad_id' => 2, // Discapacidad 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 2,
                'discapacidad_id' => 5, // Discapacidad 5
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Expediente 3
            [
                'expediente_id' => 3,
                'discapacidad_id' => 3, // Discapacidad 3
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'expediente_id' => 3,
                'discapacidad_id' => 6, // Discapacidad 6
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
