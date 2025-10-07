<?php

namespace Database\Seeders\Nuevos;

use App\Models\AsesorMigratorio;
use Illuminate\Database\Seeder;

class NuevosAsesores extends Seeder {

    protected static $asesores = [
        // CSV => DB
        1 => 1, // 'Persona Civil'
        2 => 2, // 'CDH'
        3 => 3, // 'Instituto Nacional de Migración'
        4 => 4, // 'DINAF'
        5 => 5, // 'ACNUR'
        6 => 6, // 'Policía Nacional'
        7 => 7, // 'Parroquia'
        8 => 8, // 'Cruz Roja'
        9 => 9, // 'Grupo de Sociedad Civil'
        10 => 10, // 'Medios de Comunicación'
        11 => 11, // 'Equipo Cáritas'
        12 => 12, // '911'
        13 => 13, // 'Hogar de la Esperanza'
        14 => 14, // 'CONADEH'
        15 => 15, // 'Brigada de Paz Internacional'
        16 => 16, // 'Visión Mundial'
        17 => 17, // 'Cáritas'
        18 => 18, // 'Otros Migrantes'
        19 => 19, // 'Iglesia Católica (Sacerdote)'
        20 => 20, // 'Casa Migrante San José, Ocotepeque'
        21 => 21, // 'Afiche Publicitario en Frontera'
        22 => 22, // 'Gran Terminal del Pacífico'
        23 => 23, // 'Dirección Policial de Investigación'
        24 => 24, // 'ADRA'
        25 => 25, // 'Cruz Roja Hondureña'
        26 => 26, // 'SENAF'
        27 => 27, // 'N/A'

        # Nuevos
        28 =>  28, // 'Hospital'
        29 =>  29, // 'Pastoral de Movilidad Humana'
        30 =>  30, // 'FISISUR'
        31 =>  31, // 'Bomberos'
        32 =>  32, // 'RAJUMCH'
        33 =>  33, // 'Mapa'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Create only new ones, one by one, not slices, i said, NO SLICES

        $new_asesor = AsesorMigratorio::create([
            'asesor_migratorio' => 'Hospital',
            'created_by' => 1
        ]);
        self::$asesores[28] = $new_asesor->id;


        $new_asesor = AsesorMigratorio::create([
            'asesor_migratorio' => 'Pastoral de Movilidad Humana',
            'created_by' => 1
        ]);
        self::$asesores[29] = $new_asesor->id;


        $new_asesor = AsesorMigratorio::create([
            'asesor_migratorio' => 'FISISUR',
            'created_by' => 1
        ]);
        self::$asesores[30] = $new_asesor->id;

        $new_asesor = AsesorMigratorio::create([
            'asesor_migratorio' => 'Bomberos',
            'created_by' => 1
        ]);
        self::$asesores[31] = $new_asesor->id;

        $new_asesor = AsesorMigratorio::create([
            'asesor_migratorio' => 'RAJUMCH',
            'created_by' => 1
        ]);
        self::$asesores[32] = $new_asesor->id;

        $new_asesor = AsesorMigratorio::create([
            'asesor_migratorio' => 'Mapa',
            'created_by' => 1
        ]);
        self::$asesores[33] = $new_asesor->id;
    }

    public static function getAllAsesores() {
        return self::$asesores;
    }
}
