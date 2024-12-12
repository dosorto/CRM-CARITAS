<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonacionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('donaciones')->insert([
            [
                'id_donante' => 1, // Fundación Ayuda Global
                'fecha_donacion' => '2024-01-10',
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id_donante' => 2, // Gobierno de Honduras
                'fecha_donacion' => '2024-02-15',
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id_donante' => 3, // Juan Pérez
                'fecha_donacion' => '2024-03-20',
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id_donante' => 4, // Organización Mundial de la Salud
                'fecha_donacion' => '2024-04-25',
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id_donante' => 5, // Secretaría de Salud
                'fecha_donacion' => '2024-05-05',
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id_donante' => 6, // María López
                'fecha_donacion' => '2024-06-15',
                'created_by' => 1,
                'deleted_by' => null,
                'updated_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
