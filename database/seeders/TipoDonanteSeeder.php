<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TipoDonante;
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
            ],
            [
                'descripcion' => 'Organización Gubernamental',
            ],
            [
                'descripcion' => 'Persona Natural',
            ]
        ]);
    }
}
