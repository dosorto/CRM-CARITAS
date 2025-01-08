<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FronteraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fronteras = [
            ['frontera' => 'Agua Caliente', 'departamento_id' => 1],
            ['frontera' => 'Trojes', 'departamento_id' => 2],
            ['frontera' => 'Guasaule', 'departamento_id' => 3],
            ['frontera' => 'El Amatillo', 'departamento_id' => 4],
            ['frontera' => 'Las Manos', 'departamento_id' => 5],
            ['frontera' => 'La Fraternidad', 'departamento_id' => 6],
            ['frontera' => 'N/A', 'departamento_id' => 18],
        ];

        foreach ($fronteras as $frontera) {
            DB::table('fronteras')->insert(array_merge($frontera, ['created_by' => 1]));
        }
    }
}
