<?php

namespace Database\Seeders;

use App\Models\Expediente;
use App\Models\Migrante;
use Database\Seeders\Nuevos\NuevasDiscapacidades;
use Database\Seeders\Nuevos\NuevasFronteras;
use Database\Seeders\Nuevos\NuevasNecesidades;
use Database\Seeders\Nuevos\NuevosAsesores;
use Database\Seeders\Nuevos\NuevosMotivos;
use Database\Seeders\Nuevos\NuevosPaises;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExcelSeeder extends Seeder {

    protected $migrantes = [];
    protected $expedientes = [];

    protected $discapacidades = [];
    protected $necesidades = [];
    protected $motivos = [];

    protected $db_discapacidades;
    protected $db_fronteras;
    protected $db_necesidades;
    protected $db_asesores;
    protected $db_motivos;
    protected $db_paises;


    public function run(): void {

        $this->load_data();
        $adminId = 1;
        // dd(Pais::find($this->db_paises[186]));

        // Migrantes
        // n1 | n2 | a1 | a2 | sex | dni | tipo | pais | civil | fam | lgbt | nac | sangre | c_by
        // 0    1    2    3    4     5     6      7      8       9     10    11     12      13

        // Expedientes
        // fr | asesor | situacion | obs | f_in | dead | f_out | at_psicp | as_psico | at_legal | as_psocial
        // 0    1        2           3     4      5      6       7          8          9          10

        if (
            sizeof($this->migrantes) == sizeof($this->expedientes) &&
            sizeof($this->migrantes) == sizeof($this->discapacidades) &&
            sizeof($this->migrantes) == sizeof($this->necesidades) &&
            sizeof($this->migrantes) == sizeof($this->motivos)
        ) {
            // Ciclo para insertar todos los registros
            foreach ($this->migrantes as $index => $migrante) {
                $new_migrante = Migrante::create([
                    'primer_nombre' => $migrante[0],
                    'segundo_nombre' => $migrante[1],
                    'primer_apellido' => $migrante[2],
                    'segundo_apellido' => $migrante[3],
                    'sexo' => $migrante[4],
                    'numero_identificacion' => $migrante[5] == '' ? null : $migrante[5],
                    'tipo_identificacion' => $migrante[6],
                    'pais_id' => $this->db_paises[(int)$migrante[7]],
                    'estado_civil' => $migrante[8],
                    'codigo_familiar' => $migrante[9],
                    'es_lgbt' => $migrante[10],
                    'fecha_nacimiento' => $migrante[11],
                    'tipo_sangre' => $migrante[12],
                    'created_by' => $adminId,
                ]);

                $exp = $this->expedientes[$index];

                Expediente::create([
                    'migrante_id' => $new_migrante->id,
                    'frontera_id' => $exp[0],
                    'asesor_migratorio_id' => $exp[1],
                    'situacion_migratoria_id' => $exp[2],
                    'observacion' => $exp[3],
                    'fecha_ingreso' => \Carbon\Carbon::createFromFormat('d/m/Y', $exp[4])->format('Y-m-d'),
                    'fallecimiento' => $exp[5],
                    'fecha_salida' => \Carbon\Carbon::createFromFormat('d/m/Y', $exp[6])->format('Y-m-d'),

                    'atencion_psicologica' => $exp[7],
                    'asesoria_psicologica' => $exp[8],
                    'atencion_legal' => $exp[9],
                    'asesoria_psicosocial' => $exp[10],

                    'created_by' => $adminId,
                ]);

                $discs = $this->discapacidades[$index];
                foreach ($discs as $discapacidad) {
                    if ((int) $discapacidad !== 0) {
                        $disc_id = $this->db_discapacidades[(int) $discapacidad];
                        DB::table('expedientes_discapacidades')->insert([
                            'expediente_id' => $new_migrante->id,
                            'discapacidad_id' => $disc_id,
                        ]);
                    }
                }

                $motivos = $this->motivos[$index];
                foreach ($motivos as $motivo) {
                    DB::table('expedientes_motivos_salida_pais')->insert([
                        'expediente_id' => $new_migrante->id,
                        'motivo_salida_pais_id' => $this->db_motivos[(int) $motivo],
                    ]);
                }

                $necs = $this->necesidades[$index];
                foreach ($necs as $necesidad) {
                    DB::table('expedientes_necesidades')->insert([
                        'expediente_id' => $new_migrante->id,
                        'necesidad_id' => $this->db_necesidades[(int) $necesidad],
                    ]);
                }
            }
        }
    }




    public function load_data() {

        // -------------------------------------------------------
        // Obtener registros nuevos en la db
        // -------------------------------------------------------
        $this->db_discapacidades = (new NuevasDiscapacidades())->getAllDiscapacidades();
        $this->db_fronteras = (new NuevasFronteras())->getAllFronteras();
        $this->db_necesidades = (new NuevasNecesidades())->getAllNecesidades();
        $this->db_asesores = (new NuevosAsesores())->getAllAsesores();
        $this->db_motivos = (new NuevosMotivos())->getAllMotivos();
        $this->db_paises = (new NuevosPaises())->getAllPaises();

        // -------------------------------------------------------
        // Migrantes
        // -------------------------------------------------------
        $path = database_path('seeders/data/migrantes_table.csv');
        if (!file_exists($path)) {
            dd("El archivo migrantes no existe: $path");
        }
        if (($handle = fopen($path, 'r')) !== false) {
            while (($data = fgetcsv($handle, 0, ';')) !== false) {
                $this->migrantes[] = $data;
            }
        }

        // -------------------------------------------------------
        // Expedientes
        // -------------------------------------------------------
        $path = database_path('seeders/data/expedientes_table.csv');
        if (!file_exists($path)) {
            dd("El archivo expedientes no existe: $path");
        }
        if (($handle = fopen($path, 'r')) !== false) {
            while (($data = fgetcsv($handle, 0, ';')) !== false) {
                $this->expedientes[] = $data;
            }
        }

        // -------------------------------------------------------
        // Discapacidades
        // -------------------------------------------------------
        $path = database_path('seeders/data/expedientes_discapacidades_table.csv');
        if (!file_exists($path)) {
            dd("El archivo discapacidades no existe: $path");
        }
        if (($handle = fopen($path, 'r')) !== false) {
            while (($data = fgetcsv($handle, 0, ';')) !== false) {
                $this->discapacidades[] = $data;
            }
        }

        // -------------------------------------------------------
        // Necesidades
        // -------------------------------------------------------
        $path = database_path('seeders/data/expedientes_necesidades_table.csv');
        if (!file_exists($path)) {
            dd("El archivo necesidades no existe: $path");
        }
        if (($handle = fopen($path, 'r')) !== false) {
            while (($data = fgetcsv($handle, 0, ';')) !== false) {
                $this->necesidades[] = $data;
            }
        }

        // -------------------------------------------------------
        // Motivos
        // -------------------------------------------------------
        $path = database_path('seeders/data/expedientes_motivos_table.csv');
        if (!file_exists($path)) {
            dd("El archivo motivos no existe: $path");
        }
        if (($handle = fopen($path, 'r')) !== false) {
            while (($data = fgetcsv($handle, 0, ';')) !== false) {
                $this->motivos[] = $data;
            }
        }
    }
}
