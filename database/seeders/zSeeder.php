<?php

namespace Database\Seeders;

use App\Models\Discapacidad;
use App\Models\Expediente;
use App\Models\Migrante;
use App\Models\MotivoSalidaPais;
use App\Models\Necesidad;
use App\Models\Pais;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Ods\Thumbnails;

class zSeeder extends Seeder
{
    public $diferenciaNecesidadId;
    public $diferenciaDiscapacidadId;
    public $diferenciaMotivoId;
    public $mexicoId;

    public $filasMigrantes;
    public $filasExpedientes;
    public $filasMotivos;
    public $filasNecesidades;
    public $filasDiscapacidades;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->insertarNuevosRegistrosCatalogo();
        $this->obtenerDatosArchivos();

        for ($i = 0; $i < count($this->filasMigrantes); $i++) {

            $migrante = Migrante::create([
                'primer_nombre'         => $this->filasMigrantes[$i][0],
                'segundo_nombre'        => $this->filasMigrantes[$i][1],
                'primer_apellido'       => $this->filasMigrantes[$i][2],
                'segundo_apellido'      => $this->filasMigrantes[$i][3],
                'sexo'                  => $this->filasMigrantes[$i][4],
                'tipo_identificacion'   => $this->filasMigrantes[$i][5],
                'numero_identificacion' => $this->filasMigrantes[$i][6] !== '' ? $this->filasMigrantes[$i][6] : null,
                'pais_id'               => $this->filasMigrantes[$i][7],
                'estado_civil'          => $this->filasMigrantes[$i][8],
                'codigo_familiar'       => $this->filasMigrantes[$i][9],
                'es_lgbt'               => $this->filasMigrantes[$i][10],
                'fecha_nacimiento'      => \Carbon\Carbon::createFromFormat('d/m/Y', $this->filasMigrantes[$i][11])->format('Y-m-d'),
                'tipo_sangre'           => $this->filasMigrantes[$i][12],
                'created_by'            => $this->filasMigrantes[$i][13],
            ]);

            $expediente = Expediente::create([
                'migrante_id'             => $migrante->id,
                'frontera_id'             => $this->filasExpedientes[$i][0],
                'asesor_migratorio_id'    => $this->filasExpedientes[$i][1],
                'situacion_migratoria_id' => $this->filasExpedientes[$i][2],
                'observacion'             => $this->filasExpedientes[$i][3],
                'fecha_ingreso'           => \Carbon\Carbon::createFromFormat('d/m/Y', $this->filasExpedientes[$i][4])->format('Y-m-d'),
                'fallecimiento'           => $this->filasExpedientes[$i][5],
                'fecha_salida'            => \Carbon\Carbon::createFromFormat('d/m/Y', $this->filasExpedientes[$i][6])->format('Y-m-d'),
                'atencion_psicologica'   => $this->filasExpedientes[$i][7],
                'asesoria_psicologica'   => $this->filasExpedientes[$i][8],
                'atencion_legal'         => $this->filasExpedientes[$i][9],
                'asesoria_psicosocial'   => $this->filasExpedientes[$i][10],
                'created_by'             => $this->filasExpedientes[$i][11],
            ]);

            foreach ($this->filasMotivos[$i] as $motivoId) {
                DB::table('expedientes_motivos_salida_pais')->insert([
                    'expediente_id' => $expediente->id,
                    'motivo_salida_pais_id' => $motivoId,
                ]);
            }
            foreach (array_unique($this->filasNecesidades[$i]) as $necesidadId) {
                DB::table('expedientes_necesidades')->insert([
                    'expediente_id' => $expediente->id,
                    'necesidad_id'  => $necesidadId,
                ]);
            }
            foreach ($this->filasDiscapacidades[$i] as $discapacidadId) {
                if ($discapacidadId != 0) {
                    DB::table('expedientes_discapacidades')->insert([
                        'expediente_id' => $expediente->id,
                        'discapacidad_id' => $discapacidadId,
                    ]);
                }
            }
        }
    }


    public function obtenerDatosArchivos()
    {
        // Migrantes
        // ---------
        if (($handle = fopen(getcwd() . '\database\seeders\data\migrantes_table.csv', 'r')) !== false) {
            // Loop through each row in the CSV
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                // Process each row (as an array)
                $this->filasMigrantes[] = $data;
            }
            // Close the file
            fclose($handle);
        } else {
            echo "Unable to open the file migrantes.";
        }


        // Expedientes
        // ---------
        if (($handle = fopen(getcwd() . '\database\seeders\data\expedientes_table.csv', 'r')) !== false) {
            // Loop through each row in the CSV
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                // Process each row (as an array)
                $this->filasExpedientes[] = $data;
            }
            // Close the file
            fclose($handle);
        } else {
            echo "Unable to open the file expedientes.";
        }


        // Necesidades
        // -----------
        if (($handle = fopen(getcwd() . '\database\seeders\data\expedientes_necesidades_table.csv', 'r')) !== false) {
            // Loop through each row in the CSV
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                // Process each row (as an array)
                $this->filasNecesidades[] = $data;
            }
            // Close the file
            fclose($handle);
        } else {
            echo "Unable to open the file expedientes.";
        }


        // Discapacidades
        // -----------
        if (($handle = fopen(getcwd() . '\database\seeders\data\expedientes_discapacidades_table.csv', 'r')) !== false) {
            // Loop through each row in the CSV
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                // Process each row (as an array)
                $this->filasDiscapacidades[] = $data;
            }
            // Close the file
            fclose($handle);
        } else {
            echo "Unable to open the file expedientes.";
        }


        // Motivos
        // -----------
        if (($handle = fopen(getcwd() . '\database\seeders\data\expedientes_motivos_table.csv', 'r')) !== false) {
            // Loop through each row in the CSV
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                // Process each row (as an array)
                $this->filasMotivos[] = $data;
            }
            // Close the file
            fclose($handle);
        } else {
            echo "Unable to open the file expedientes.";
        }
    }


    public function insertarMigrante() {}
    public function insertarExpediente() {}
    public function insertarDiscapacidades() {}
    public function insertarMotivos() {}
    public function insertarNecesidades() {}


    public function insertarNuevosRegistrosCatalogo()
    {
        $this->diferenciaMotivoId = intval(MotivoSalidaPais::max('id')) - 25;
        $this->diferenciaNecesidadId = intval(Necesidad::max('id')) - 7;
        $this->diferenciaDiscapacidadId = intval(Discapacidad::max('id')) - 7;
        try {
            $mexico = Pais::create(['nombre_pais' => 'México', 'created_by' => 1, 'codigo_alfa3' => 'MEX', 'codigo_numerico' => '484']);
            $this->mexicoId = $mexico->id;
        } catch (Exception $e) {
            $this->mexicoId = Pais::select('id')->where('nombre_pais', 'México');
        }

        $nuevosMotivos = [
            'N/A',
            'Problema sociales',
            'Abuso de dirigentes',
            'Problema ambientales',
            'Persecución',
            'Xenofobia',
            'Promesa a la Virgen Guadalupe de recorrer CA en bicicleta',
            'Mejor futuro',
            'Amenaza de muerte',
            'Situación política',
            'Discriminación',
            'Turismo',
            'Exilio',
        ];
        foreach ($nuevosMotivos as $motivo) {
            MotivoSalidaPais::create(['motivo_salida_pais' => $motivo, 'created_by' => 1]);
        }

        $nuevasDiscapacidades = [
            'Síndrome de Down',
            'Psiquiátrica',
            'Autismo',
            'N/A',
        ];
        foreach ($nuevasDiscapacidades as $discapacidad) {
            Discapacidad::create(['discapacidad' => $motivo, 'created_by' => 1]);
        }

        $nuevasDiscapacidades = [
            'Síndrome de Down',
            'Psiquiátrica',
            'Autismo',
            'N/A',
        ];
        foreach ($nuevasDiscapacidades as $discapacidad) {
            Discapacidad::create(['discapacidad' => $discapacidad, 'created_by' => 1]);
        }

        $nuevasNecesidades = [
            'Atención Médica',
            'Kit de Higiene Personal',
            'Atención Psicológica',
            'Orientación',
            'Transporte',
            'Comunicación',
            'Pañales',
            'Lavandería',
            'Asesoría Legal',
            'Reunirse con Familiares',
            'Juguetes',
            'Atención Odontológica',
            'Rodillera',
            'Seguridad',
            'Permiso',
            'N/A',
        ];
        foreach ($nuevasNecesidades as $necesidad) {
            Necesidad::create(['necesidad' => $necesidad, 'created_by' => 1]);
        }
    }
}
