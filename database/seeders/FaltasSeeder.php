<?php

namespace Database\Seeders;

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
            DB::table('gravedades_faltas')->insert(array_merge(
                $gravedad,
                [
                    'created_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ));
        }

        $faltas = [
            // Leves
            ['falta' => 'Llegar tarde al horario de comida', 'gravedad_falta_id' => 1],
            ['falta' => 'Uso indebido de espacios comunes', 'gravedad_falta_id' => 1],
            ['falta' => 'No colaborar en tareas de limpieza', 'gravedad_falta_id' => 1],
            ['falta' => 'Hablar en voz alta durante las horas de descanso', 'gravedad_falta_id' => 1],

            // Graves
            ['falta' => 'Altercados verbales con otros residentes', 'gravedad_falta_id' => 2],
            ['falta' => 'Desobedecer normas de convivencia', 'gravedad_falta_id' => 2],
            ['falta' => 'Fumar en áreas no designadas', 'gravedad_falta_id' => 2],
            ['falta' => 'Uso indebido de recursos del albergue', 'gravedad_falta_id' => 2],

            // Muy graves
            ['falta' => 'Agresiones físicas a otros residentes', 'gravedad_falta_id' => 3],
            ['falta' => 'Robo a otros migrantes o al albergue', 'gravedad_falta_id' => 3],
            ['falta' => 'Amenazas graves hacia el personal o residentes', 'gravedad_falta_id' => 3],
            ['falta' => 'Destrucción intencional de propiedad del albergue', 'gravedad_falta_id' => 3],
        ];


        foreach ($faltas as $falta) {
            DB::table('faltas')->insert(array_merge($falta, [
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]));
        }
    }
}
