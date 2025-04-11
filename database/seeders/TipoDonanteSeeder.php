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
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('tipo_donante')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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
                'descripcion' => 'Persona Civil',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
