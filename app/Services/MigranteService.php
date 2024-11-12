<?php

namespace App\Services;

use App\Models\Migrante;

class MigranteService
{

    public function test()
    {
        return 1;
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

        return $nuevoMigrante->save();
    }

    public function separarNombres($cadena)
    {
        $partes = explode(' ', $cadena, 2); // Divide en 2 partes, donde el primer elemento es el primero
        $primero = $partes[0]; // Primer palabra es el primer nombre o apellido
        $segundo = isset($partes[1]) ? $partes[1] : ''; // Resto del string es el segundo nombre o apellido (o vacío si no hay)

        return [$primero, $segundo];
    }

    public function filtrar(string $col, string $text)
    {
        return Migrante::select(
            'id',
            'codigo_familiar',
            'primer_nombre',
            'primer_apellido',
            'segundo_nombre',
            'segundo_apellido',
            'numero_identificacion',
            'tipo_identificacion',
            'fecha_nacimiento',
            'pais_id',
            'es_lgbt',
            'estado_civil',
            'sexo'
        )
            ->with('pais')
            ->where($col, 'LIKE', '%' . $text . '%')
            ->get();
    }

    public function getAllMigrantes()
    {
        return Migrante::select(
            'id',
            'codigo_familiar',
            'primer_nombre',
            'primer_apellido',
            'segundo_nombre',
            'segundo_apellido',
            'numero_identificacion',
            'tipo_identificacion',
            'fecha_nacimiento',
            'pais_id',
            'es_lgbt',
            'estado_civil',
            'sexo'
        )
            ->with('pais')
            ->get();
    }

    public function generateNewFamiliarCode()
    {
        return Migrante::max('codigo_familiar') + 1;
    }
}
