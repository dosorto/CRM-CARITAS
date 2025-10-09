<?php

namespace Database\Seeders\Nuevos;

use App\Models\MotivoSalidaPais;
use Illuminate\Database\Seeder;

class NuevosMotivos extends Seeder {
    protected static $motivos = [
        // CSV => DB
        1 => 1, // 'Persecución política'
        2 => 2, // 'Mejor oportunidad de vida'
        3 => 3, // 'Violencia y amenazas'
        4 => 4, // 'Pobreza'
        5 => 5, // 'Situación económica del país'
        6 => 6, // 'Problemas políticos'
        7 => 7, // 'Falta de empleo y oportunidades'
        8 => 8, // 'Crisis humanitaria'
        9 => 9, // 'Seguridad personal'
        10 => 10, // 'Reunificación familiar'
        11 => 11, // 'Corrupción del gobierno'
        12 => 12, // 'Violencia doméstica'
        13 => 13, // 'Desempleo'
        14 => 14, // 'Mejor futuro para la familia'
        15 => 15, // 'Conflicto armado'
        16 => 16, // 'Persecución religiosa'
        17 => 17, // 'Dictadura del gobierno'
        18 => 18, // 'Discriminación y homofobia'
        19 => 19, // 'Extorsión por grupos delictivos'
        20 => 20, // 'Situación crítica del país'
        21 => 21, // 'Escasez de alimentos'
        22 => 22, // 'Ayuda para la familia'
        23 => 23, // 'Problemas de salud'
        24 => 24, // 'Aspiración a mejores estudios y calidad de vida'
        25 => 25, // 'Problemas económicos'

        // Nuevos
        26 => 26, // 'N/A'
        27 => 27, // 'Problema sociales'
        28 => 28, // 'Abuso de dirigentes'
        29 => 29, // 'Problema ambientales'
        30 => 30, // 'Persecución'
        31 => 31, // 'Xenofobia'
        32 => 32, // 'Promesa a la Virgen Guadalupe de recorrer CA en bicicleta'
        33 => 33, // 'Mejor futuro'
        34 => 34, // 'Amenaza de muerte'
        35 => 35, // 'Situación política'
        36 => 36, // 'Discriminación'
        37 => 37, // 'Turismo'
        38 => 38, // 'Exilio'
        39 => 39, // 'Reclutamiento forzado'
        40 => 40, // 'Desplazamiento forzado'
        41 => 41, // 'Terrorismo'
        42 => 42, // 'Proceso Militar'
    ];


    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Create only new ones, one by one, not slices, i said, NO SLICES

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'N/A',
            'created_by' => 1,
        ]);
        self::$motivos[26] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Problema sociales',
            'created_by' => 1,
        ]);
        self::$motivos[27] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Abuso de dirigentes',
            'created_by' => 1,
        ]);
        self::$motivos[28] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Problema ambientales',
            'created_by' => 1,
        ]);
        self::$motivos[29] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Persecución',
            'created_by' => 1,
        ]);
        self::$motivos[30] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Xenofobia',
            'created_by' => 1,
        ]);
        self::$motivos[31] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Promesa a la Virgen Guadalupe de recorrer CA en bicicleta',
            'created_by' => 1,
        ]);
        self::$motivos[32] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Mejor futuro',
            'created_by' => 1,
        ]);
        self::$motivos[33] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Amenaza de muerte',
            'created_by' => 1,
        ]);
        self::$motivos[34] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Situación política',
            'created_by' => 1,
        ]);
        self::$motivos[35] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Discriminación',
            'created_by' => 1,
        ]);
        self::$motivos[36] = $new_motivo->id;

        // $new_motivo = MotivoSalidaPais::create([
        //     'motivo_salida_pais' => 'Turismo',
        //     'created_by' => 1,
        // ]);
        self::$motivos[37] = 26; // Turismo ya existe, es el ID 26

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Exilio',
            'created_by' => 1,
        ]);
        self::$motivos[38] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Reclutamiento forzado',
            'created_by' => 1,
        ]);
        self::$motivos[39] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Desplazamiento forzado',
            'created_by' => 1,
        ]);
        self::$motivos[40] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Terrorismo',
            'created_by' => 1,
        ]);
        self::$motivos[41] = $new_motivo->id;

        $new_motivo = MotivoSalidaPais::create([
            'motivo_salida_pais' => 'Proceso Militar',
            'created_by' => 1,
        ]);
        self::$motivos[42] = $new_motivo->id;
    }

    public static function getAllMotivos() {
        return self::$motivos;
    }
}
