<?php

namespace App\Services;

use App\Models\Expediente;
use App\Models\Migrante;
use Carbon\Carbon;
use Exception;
use Livewire\WithPagination;

class MigranteService
{
    use WithPagination;

    public function tieneExpedienteActivo($id)
    {
        $migrante = Migrante::find($id)->first();
        foreach ($migrante->expedientes as $expediente) {
            if ($expediente->fecha_salida === null) {
                return true;
            }
        }
        return false;
    }

    public function obtenerPrimerNombreApellido($id)
    {
        $migrante = Migrante::find($id)->first();
        if ($migrante) {
            return $migrante->primer_nombre . ' ' . $migrante->primer_apellido;
        }
        return null;
    }

    public function obtenerIdentificacion($id)
    {
        $migrante = Migrante::find($id)->first();
        if ($migrante) {
            return $migrante->numero_identificacion;
        }
        return null;
    }

    public function guardarDatosPersonales($datosPersonales)
    {
        $nuevoMigrante = new Migrante();
        $nuevoMigrante->primer_nombre = $datosPersonales['primerNombre'];
        $nuevoMigrante->segundo_nombre = $datosPersonales['segundoNombre'];
        $nuevoMigrante->primer_apellido = $datosPersonales['primerApellido'];
        $nuevoMigrante->segundo_apellido = $datosPersonales['segundoApellido'];
        $nuevoMigrante->numero_identificacion = $datosPersonales['identificacion'];
        $nuevoMigrante->tipo_identificacion = $datosPersonales['tipoIdentificacion'];
        $nuevoMigrante->sexo = $datosPersonales['sexo'];
        $nuevoMigrante->pais_id = $datosPersonales['idPais'];
        $nuevoMigrante->codigo_familiar = $datosPersonales['codigoFamiliar'];
        $nuevoMigrante->fecha_nacimiento = $datosPersonales['fechaNacimiento'];
        $nuevoMigrante->estado_civil = $datosPersonales['estadoCivil'];
        $nuevoMigrante->es_lgbt = $datosPersonales['esLGBT'];

        $nuevoMigrante->save();



        return $nuevoMigrante->id;
    }

    public function obtenerDatosNombresSeparados($datos)
    {
        // Separar nombres y apellidos
        $nombres = $this->separarNombres($datos['nombres']);
        $apellidos = $this->separarNombres($datos['apellidos']);

        // Eliminar los campos originales y añadir los nuevos
        unset($datos['nombres']);
        unset($datos['apellidos']);

        return array_merge($datos, [
            'primerNombre' => $nombres[0],
            'segundoNombre' => $nombres[1],
            'primerApellido' => $apellidos[0],
            'segundoApellido' => $apellidos[1]
        ]);
    }

    public function separarNombres($cadena)
    {
        $partes = explode(' ', $cadena, 2); // Divide en 2 partes, donde el primer elemento es el primero
        $primero = $partes[0]; // Primer palabra es el primer nombre o apellido
        $segundo = isset($partes[1]) ? $partes[1] : ''; // Resto del string es el segundo nombre o apellido (o vacío si no hay)

        return [$primero, $segundo];
    }

    public function filter(string $col, string $text)
    {
        return Migrante::where($col, 'LIKE', '%' . $text . '%')
            ->with('pais')
            ->get();
    }

    public function filterPaginated(string $col, string $text, $pagination)
    {
        return Migrante::where($col, 'LIKE', '%' . $text . '%')
            ->with('pais')
            ->paginate($pagination);
    }

    public function getAllMigrantes()
    {
        return Migrante::all();
    }

    public function getAllMigrantesPaginated($pagination)
    {
        return Migrante::paginate($pagination);
    }

    public function buscar($col, $text)
    {
        return Migrante::where($col, $text)
            ->with('pais')
            ->first();
    }

    public function generateNewFamiliarCode()
    {;
        return Migrante::max('codigo_familiar') + 1;
    }

    public function guardarExpediente(
        $migranteId,
        $motivosSalidaPais = [],
        $necesidades = [],
        $discapacidades = [],
        $fronteraId = 1,
        $asesorMigratorioId = 1,
        $situacionMigratoriaId = 1,
        $observacion = ''
    ) {
        try {
            // guardar expediente
            $expediente = new Expediente();
            $expediente->migrante_id = $migranteId;
            $expediente->frontera_id = $fronteraId;
            $expediente->asesor_migratorio_id = $asesorMigratorioId;
            $expediente->situacion_migratoria_id = $situacionMigratoriaId;
            $expediente->observacion = $observacion;
            $expediente->save();
            $expediente->motivosSalidaPais()->sync($motivosSalidaPais);
            $expediente->necesidades()->sync($necesidades);
            $expediente->discapacidades()->sync($discapacidades);

            return $expediente->id;
        } catch (Exception $e) {
            dd('ocurrió un error al guardar el expediente', $e->getMessage());
            return false;
        }
    }

    public function calcularEdad($fechaNacimiento)
    {
        // Asegúrate de que la fecha de nacimiento esté bien parseada
        $fecha = Carbon::parse($fechaNacimiento);
        // Calcula la edad en años
        return $fecha->age;
    }

    public function getLastCreated($max)
    {
        return Migrante::latest()
            ->take($max)
            ->get();
    }

    public function registrarSalida($datosSalida) {}
}
