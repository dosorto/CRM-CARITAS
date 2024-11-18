<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscapacidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $condiciones = [
            'Visual',
            'Auditiva',
            'Motriz',
            'Intelectual',
            'Psicosocial',
            'Lenguaje',
            'Múltiple',
        ];

        foreach ($condiciones as $condicion) {
            DB::table('discapacidades')->insert([
                'discapacidad' => $condicion,
            ]);
        }
    }
}
