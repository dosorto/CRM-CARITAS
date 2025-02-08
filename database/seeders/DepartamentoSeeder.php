<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            ['nombre_departamento' => 'Atlántida', 'codigo_departamento' => 'HN-AT', 'pais_id' => 74],
            ['nombre_departamento' => 'Colón', 'codigo_departamento' => 'HN-CL', 'pais_id' => 74],
            ['nombre_departamento' => 'Comayagua', 'codigo_departamento' => 'HN-CM', 'pais_id' => 74],
            ['nombre_departamento' => 'Copán', 'codigo_departamento' => 'HN-CP', 'pais_id' => 74],
            ['nombre_departamento' => 'Cortés', 'codigo_departamento' => 'HN-CR', 'pais_id' => 74],
            ['nombre_departamento' => 'El Paraíso', 'codigo_departamento' => 'HN-EP', 'pais_id' => 74],
            ['nombre_departamento' => 'Francisco Morazán', 'codigo_departamento' => 'HN-FM', 'pais_id' => 74],
            ['nombre_departamento' => 'Gracias a Dios', 'codigo_departamento' => 'HN-GD', 'pais_id' => 74],
            ['nombre_departamento' => 'Intibucá', 'codigo_departamento' => 'HN-IN', 'pais_id' => 74],
            ['nombre_departamento' => 'Islas de la Bahía', 'codigo_departamento' => 'HN-IB', 'pais_id' => 74],
            ['nombre_departamento' => 'La Paz', 'codigo_departamento' => 'HN-LP', 'pais_id' => 74],
            ['nombre_departamento' => 'Lempira', 'codigo_departamento' => 'HN-LE', 'pais_id' => 74],
            ['nombre_departamento' => 'Ocotepeque', 'codigo_departamento' => 'HN-OC', 'pais_id' => 74],
            ['nombre_departamento' => 'Olancho', 'codigo_departamento' => 'HN-OL', 'pais_id' => 74],
            ['nombre_departamento' => 'Santa Bárbara', 'codigo_departamento' => 'HN-SB', 'pais_id' => 74],
            ['nombre_departamento' => 'Valle', 'codigo_departamento' => 'HN-VA', 'pais_id' => 74],
            ['nombre_departamento' => 'Yoro', 'codigo_departamento' => 'HN-YO', 'pais_id' => 74],
            ['nombre_departamento' => 'Choluteca', 'codigo_departamento' => 'HN-CH', 'pais_id' => 74],
            ['nombre_departamento' => 'Machiques', 'codigo_departamento' => '0263', 'pais_id' => 179],
            ['nombre_departamento' => 'Atlántico', 'codigo_departamento' => '08', 'pais_id' => 39],
        ];

        foreach ($departamentos as $departamento) {

            DB::table('departamentos')->insert(
                array_merge(
                    $departamento,
                    [
                        'created_by' => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                )
            );
        }
    }
}
