<?php

namespace Database\Seeders\Nuevos;

use App\Models\Discapacidad;
use Illuminate\Database\Seeder;

class NuevasDiscapacidades extends Seeder
{
    protected static $discapacidades = [
        // CSV => DB
        1 => 1, // 'Visual'
        2 => 2, // 'Auditiva'
        3 => 3, // 'Motriz'
        4 => 4, // 'Intelectual'
        5 => 5, // 'Psicosocial'
        6 => 6, // 'Lenguaje'
        7 => 7, // 'Múltiple'
        // Nuevas
        8 => 8, // 'Síndrome de Down'
        9 => 9, // 'Psiquiátrica'
        10 => 10, // 'Autismo'
        11 => 11, // 'N/A'
    ];

    public function run():  void
    {
        // Create only new ones, one by one, not slices, i said, NO SLICES

        $new_discapacidad = Discapacidad::create([
            'discapacidad' => 'Síndrome de Down',
            'created_by' => 1
        ]);
        self::$discapacidades[8] = $new_discapacidad->id;

        $new_discapacidad = Discapacidad::create([
            'discapacidad' => 'Psiquiátrica',
            'created_by' => 1
        ]);
        self::$discapacidades[9] = $new_discapacidad->id;

        $new_discapacidad = Discapacidad::create([
            'discapacidad' => 'Autismo',
            'created_by' => 1
        ]);
        self::$discapacidades[10] = $new_discapacidad->id;

        $new_discapacidad = Discapacidad::create([
            'discapacidad' => 'N/A',
            'created_by' => 1
        ]);
        self::$discapacidades[11] = $new_discapacidad->id;
    }

    public static function getAllDiscapacidades() {
        return self::$discapacidades;
    }
}
