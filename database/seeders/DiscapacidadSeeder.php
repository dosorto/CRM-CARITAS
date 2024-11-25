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
        $discapacidades = [
            'Visual',
            'Auditiva',
            'Motriz',
            'Intelectual',
            'Psicosocial',
            'Lenguaje',
            'Múltiple',
        ];

        foreach ($discapacidades as $discapacidad) {
            DB::table('discapacidades')->insert([
                'discapacidad' => $discapacidad,
                'created_by' => 1
            ]);
        }
    }
}
