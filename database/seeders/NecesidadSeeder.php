<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NecesidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $necesidades = [
            'Asilo',
            'Agua',
            'Alimentación',
            'Teléfono Celular',
            'Dinero',
            'Ropa',
            'Ducha',
        ];
        foreach ($necesidades as $necesidad) {
            DB::table('necesidades')->insert([
                'necesidad' => $necesidad,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
