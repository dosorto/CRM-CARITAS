<?php

namespace Database\Seeders;

use App\Models\AsesorMigratorio;
use Illuminate\Database\Seeder;

class AsesorMigratorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asesoresMigratorios = [
            'Persona Civil',
            'CDH',
            'Instituto Nacional de Migración',
            'DINAF',
            'ACNUR',
            'Policía Nacional',
            'Parroquia',
            'Cruz Roja',
            'Grupo de Sociedad Civil',
            'Medios de Comunicación',
            'Equipo Cáritas',
            '911',
            'Hogar de la Esperanza',
            'CONADEH',
            'Brigada de Paz Internacional',
            'Visión Mundial',
            'Cáritas',
            'Otros Migrantes',
            'Iglesia Católica (Sacerdote)',
            'Casa Migrante San José, Ocotepeque',
            'Afiche Publicitario en Frontera',
            'Gran Terminal del Pacífico',
            'Dirección Policial de Investigación',
            'ADRA',
            'Cruz Roja Hondureña',
            'SENAF',
            'N/A',
        ];

        foreach ($asesoresMigratorios as $asesor) {

            AsesorMigratorio::create(
                [
                    'asesor_migratorio' => $asesor,
                    'created_by' => 1
                ]
            );
        }
    }
}
