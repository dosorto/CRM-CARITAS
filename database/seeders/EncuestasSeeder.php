<?php

namespace Database\Seeders;

use App\Models\KPI;
use App\Models\Pregunta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EncuestasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('kpis')->truncate();
        DB::table('preguntas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kpis = [
            'Satisfacción de estadía en el centro',
            'Higiene y seguridad del centro',
            'Cocina y utensilios',
            'Área de descanso',
            'Área de comunicación libre',
            'Áreas de recreación',
            'Trato digno y seguro del personal',
            'Asesoría legal',
            'Asesoría o atención psicosocial',
        ];

        foreach ($kpis as $kpi) {
            KPI::create([
                'kpi' => $kpi,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $preguntas = [

            'Español' => [
                '¿Su estadía en el centro fue buena?',
                '¿Las instalaciones del centro de atención estaban seguras y limpias?',
                '¿El centro contaba con cocina y utensilios?',
                '¿Tenía un lugar donde dormir o descansar?',
                '¿Tuvo un espacio donde podía comunicarse libremente con sus familiares o amigos?',
                '¿El centro contaba con áreas de recreación y juegos lúdicos?',
                '¿El trato del personal para con usted fue digno y seguro?',
                '¿Recibió asesoría legal?',
                '¿Recibió asesoría o atención psicosocial?',
            ],

            'English' => [
                'Was your stay at the center good?',
                'Were the care center facilities safe and clean?',
                'Did the center have a kitchen and utensils?',
                'Did you have a place to sleep or rest?',
                'Did you have a space where you could freely communicate with your family or friends?',
                'Did the center have recreational areas and play activities?',
                "Was the staff's treatment of you dignified and safe?",
                'Did you receive legal advice?',
                'Did you receive psychosocial counseling or care?',
            ],


        ];



        foreach ($preguntas as $idioma => $textos) {

            $idKPI = 0;

            foreach ($textos as $texto)
            {
                $idKPI++;
                Pregunta::create([
                    'id_kpi' => $idKPI,
                    'pregunta' => $texto,
                    'idioma' => $idioma,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
