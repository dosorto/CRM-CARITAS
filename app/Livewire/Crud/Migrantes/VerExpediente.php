<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Expediente;
use App\Models\Pais;
use Carbon\Carbon;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy()]
class VerExpediente extends Component
{
    public $expedienteId;

    public $nombre;
    public $identificacion;
    public $tipoIdentificacion;
    public $fechaNacimiento;
    public $pais;
    public $sexo;
    public $estadoCivil;
    public $codigoFamiliar;
    public $esLGBT;
    public $tipoSangre;
    public $edad;

    public $situacionMigratoria;
    public $asesorMigratorio;
    public $frontera;
    public $fechaIngreso;
    public $fechaSalida;
    public $necesidades;
    public $discapacidades;
    public $motivos;
    public $observacion;

    public $mostrarFechaSalida = true;

    public $migranteId;

    public function mount($expedienteId = 0)
    {
        $this->expedienteId = $expedienteId;
        $expediente = Expediente::find($expedienteId);

        if (!$expedienteId || !$expediente) {
            return $this->cargarVacio();
        }

        $migrante = $expediente->migrante;

        $this->nombre = $migrante->primer_nombre . ' ' .
            $migrante->segundo_nombre . ' ' .
            $migrante->primer_apellido . ' ' .
            $migrante->segundo_apellido;

        $this->fechaNacimiento = $migrante->fecha_nacimiento
            ? Carbon::parse($migrante->fecha_nacimiento)->format('d-m-Y')
            : '';

        $this->edad = $migrante->fecha_nacimiento
            ? Carbon::parse($migrante->fecha_nacimiento)->age
            : null;

        $this->identificacion = $migrante->numero_identificacion;
        $this->tipoIdentificacion = $migrante->tipo_identificacion;
        $this->pais = Pais::find($migrante->pais_id)->nombre_pais ?? '';
        $this->sexo = $migrante->sexo == 'M' ? 'Masculino' : 'Femenino';
        $this->estadoCivil = $migrante->sexo == 'M' ? str_replace('/a', '', $migrante->estado_civil) : str_replace('o/', '', $migrante->estado_civil);
        $this->codigoFamiliar = $migrante->codigo_familiar;
        $this->esLGBT = $migrante->es_lgbt;
        $this->tipoSangre = $migrante->tipo_sangre;



        $this->fechaIngreso = $expediente->fecha_ingreso
            ? Carbon::parse($expediente->fecha_ingreso)->format('d-m-Y')
            : '';


        $this->fechaSalida = $expediente->fecha_salida
            ? Carbon::parse($expediente->fecha_salida)->format('d-m-Y')
            : '';

        $this->situacionMigratoria = $expediente->situacionMigratoria?->situacion_migratoria ?? '-';
        $this->asesorMigratorio = $expediente->asesorMigratorio?->asesor_migratorio ?? '-';
        $this->frontera = $expediente->frontera?->frontera ?? '-';
        $this->necesidades = $expediente->necesidades->pluck('necesidad')->join(', ');
        $this->discapacidades = $expediente->discapacidades->pluck('discapacidad')->join(', ');
        $this->motivos = $expediente->motivosSalidaPais->pluck('motivo_salida_pais')->join(', ');
        $this->observacion = $expediente->observacion;

        $this->migranteId = $migrante->id;
    }

    public function verMigrantes()
    {
        $this->redirectRoute('ver-migrantes');
    }

    public function verHistorial()
    {
        $this->redirectRoute('ver-historial', ['migranteId' => $this->migranteId]);
    }

    public function imprimirVacio()
    {
        $this->redirectRoute('ver-expediente');
    }

    public function cargarVacio()
    {
        $this->nombre = '';
        $this->identificacion = '';
        $this->tipoIdentificacion = '';
        $this->fechaNacimiento = '';
        $this->pais = '';
        $this->sexo = '';
        $this->estadoCivil = '';
        $this->codigoFamiliar = -1; // el 0 es para migrantes sin familiares, entonces el campo familia # desapareceria.
        $this->esLGBT = -1;
        $this->tipoSangre = '';
        $this->edad = '';

        $this->situacionMigratoria = '';
        $this->asesorMigratorio = '';
        $this->frontera = '';
        $this->fechaIngreso = null;
        $this->necesidades = '';
        $this->discapacidades = '';
        $this->observacion = '';
        $this->motivos = '';
    }

    public function cambiarVisibilidadFechaSalida()
    {
        $this->mostrarFechaSalida = !$this->mostrarFechaSalida;
    }

    public function render()
    {
        return view('livewire.crud.migrantes.ver-expediente');
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }
}
