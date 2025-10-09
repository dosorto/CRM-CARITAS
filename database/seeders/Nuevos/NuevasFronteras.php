<?php

namespace Database\Seeders\Nuevos;

use App\Models\Departamento;
use App\Models\Frontera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NuevasFronteras extends Seeder
{
    protected static $fronteras = [
        // CSV => DB
        1 => 1, // 'Agua Caliente'
        2 => 2, // 'Trojes'
        3 => 3, // 'Guasaule'
        4 => 4, // 'El Amatillo'
        5 => 5, // 'Las Manos'
        6 => 6, // 'La Fraternidad'
        7 => 7, // 'N/A'

        # Nuevas
        8 => 8, // 'Corinto'
        9 => 9, // 'El Espino'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Corinto en Cortés
        // $cortes = Departamento::where('nombre_departamento', 'Cortés')->first(); // Atlántida
        // $corinto = Frontera::create([
        //     'frontera' => 'Corinto',
        //     'departamento_id' => $cortes->id,
        //     'created_by' => 1
        // ]);

        $paraiso = Departamento::where('nombre_departamento', 'El Paraíso')->first(); // Atlántida
        $espino = Frontera::create([
            'frontera' => 'El Espino',
            'departamento_id' => $paraiso->id,
            'created_by' => 1
        ]);

        // self::$fronteras[8] = $corinto->id;
        self::$fronteras[9] = $espino->id;
    }

    public static function getAllFronteras() {
        return self::$fronteras;
    }
}
