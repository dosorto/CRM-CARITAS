<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDonanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_donante')->insert([
            [
                'descripcion' => 'ONG',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'descripcion' => 'Organización Gubernamental',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'descripcion' => 'Persona',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
