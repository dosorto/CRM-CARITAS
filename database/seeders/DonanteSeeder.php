<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonanteSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('donantes')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // DB::table('donantes')->insert([
        //     [
        //         'nombre_donante' => 'Fundación Ayuda Global',
        //         'tipo_donante_id' => 1, // ONG
        //         'created_by' => 1,
        //         'deleted_by' => null,
        //         'updated_by' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'deleted_at' => null,
        //     ],
        //     [
        //         'nombre_donante' => 'Gobierno de Honduras',
        //         'tipo_donante_id' => 2, // Organización Gubernamental
        //         'created_by' => 1,
        //         'deleted_by' => null,
        //         'updated_by' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'deleted_at' => null,
        //     ],
        //     [
        //         'nombre_donante' => 'Juan Pérez',
        //         'tipo_donante_id' => 3, // Persona Natural
        //         'created_by' => 1,
        //         'deleted_by' => null,
        //         'updated_by' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'deleted_at' => null,
        //     ],
        //     [
        //         'nombre_donante' => 'Organización Mundial de la Salud',
        //         'tipo_donante_id' => 1, // ONG
        //         'created_by' => 1,
        //         'deleted_by' => null,
        //         'updated_by' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'deleted_at' => null,
        //     ],
        //     [
        //         'nombre_donante' => 'Secretaría de Salud',
        //         'tipo_donante_id' => 2, // Organización Gubernamental
        //         'created_by' => 1,
        //         'deleted_by' => null,
        //         'updated_by' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'deleted_at' => null,
        //     ],
        //     [
        //         'nombre_donante' => 'María López',
        //         'tipo_donante_id' => 3, // Persona Natural
        //         'created_by' => 1,
        //         'deleted_by' => null,
        //         'updated_by' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'deleted_at' => null,
        //     ],
        // ]);
    }
}
