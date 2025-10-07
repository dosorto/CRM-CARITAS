<?php

namespace Database\Seeders\Nuevos;

use App\Models\Necesidad;
use Illuminate\Database\Seeder;

class NuevasNecesidades extends Seeder
{
    protected static $necesidades = [
        // CSV => DB
        1 => 1, // 'Alojamiento'
        2 => 2, // 'Agua'
        3 => 3, // 'Alimentación'
        4 => 4, // 'Teléfono Celular'
        5 => 5, // 'Dinero'
        6 => 6, // 'Ropa'
        7 => 7, // 'Ducha'

        // Nuevas
        8 => 8, // 'Atención Médica'
        9 => 9, // 'Kit de Higiene Personal'
        10 => 10, // 'Atención Psicológica'
        11 => 11, // 'Orientación'
        12 => 12, // 'Transporte'
        13 => 13, // 'Comunicación'
        14 => 14, // 'Pañales'
        15 => 15, // 'Lavandería'
        16 => 16, // 'Asesoría Legal'
        17 => 17, // 'Reunirse con Familiares'
        18 => 18, // 'Juguetes'
        19 => 19, // 'Atención Odontológica'
        20 => 20, // 'Rodillera'
        21 => 21, // 'Seguridad'
        22 => 22, // 'Permiso para Viajar'
        23 => 23, // 'N/A'
        24 => 24, // 'Trabajo'
    ];

    public function run(): void
    {
        $new_necesidad = Necesidad::create([
            'necesidad' => 'Atención Médica',
            'created_by' => 1
        ]);
        self::$necesidades[8] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Kit de Higiene Personal',
            'created_by' => 1
        ]);
        self::$necesidades[9] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Atención Psicológica',
            'created_by' => 1
        ]);
        self::$necesidades[10] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Orientación',
            'created_by' => 1
        ]);
        self::$necesidades[11] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Transporte',
            'created_by' => 1
        ]);
        self::$necesidades[12] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Comunicación',
            'created_by' => 1
        ]);
        self::$necesidades[13] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Pañales',
            'created_by' => 1
        ]);
        self::$necesidades[14] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Lavandería',
            'created_by' => 1
        ]);
        self::$necesidades[15] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Asesoría Legal',
            'created_by' => 1
        ]);
        self::$necesidades[16] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Reunirse con Familiares',
            'created_by' => 1
        ]);
        self::$necesidades[17] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Juguetes',
            'created_by' => 1
        ]);
        self::$necesidades[18] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Atención Odontológica',
            'created_by' => 1
        ]);
        self::$necesidades[19] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Rodillera',
            'created_by' => 1
        ]);
        self::$necesidades[20] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Seguridad',
            'created_by' => 1
        ]);
        self::$necesidades[21] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Permiso para Viajar',
            'created_by' => 1
        ]);
        self::$necesidades[22] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'N/A',
            'created_by' => 1
        ]);
        self::$necesidades[23] = $new_necesidad->id;

        $new_necesidad = Necesidad::create([
            'necesidad' => 'Trabajo',
            'created_by' => 1
        ]);
        self::$necesidades[24] = $new_necesidad->id;
    }

    public static function getAllNecesidades() {
        return self::$necesidades;
    }
}
