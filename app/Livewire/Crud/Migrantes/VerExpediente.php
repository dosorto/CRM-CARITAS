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
    public $nombre;
    public $identificacion;
    public $fechaNacimiento;

    public $pais;
    public $sexo;
    public $estadoCivil;
    public $codigoFamiliar;
    public $esLGBT;
    public $tipoSangre;

    public $situacionMigratoria;
    public $faltas;
    public $fechaIngreso;
    public $necesidades;
    public $discapacidades;
    public $observacion;

    public function mount($expedienteId)
    {
        $expediente = Expediente::find($expedienteId);
        $migrante = $expediente->migrante;

        $this->nombre = $migrante->primer_nombre . ' ' .
            $migrante->segundo_nombre . ' ' .
            $migrante->primer_apellido . ' ' .
            $migrante->segundo_apellido;

        $this->fechaNacimiento = $migrante->fecha_nacimiento
            ? Carbon::parse($migrante->fecha_nacimiento)->format('d-m-Y')
            : '';
        $this->identificacion = $migrante->numero_identificacion;
        $this->pais = Pais::find($migrante->pais_id)->nombre_pais;
        $this->sexo = $migrante->sexo == 'M' ? 'Masculino' : 'Femenino';
        $this->estadoCivil = $migrante->sexo == 'M' ? str_replace('/a', '', $migrante->estado_civil) : str_replace('o/', '', $migrante->estado_civil);
        $this->codigoFamiliar = $migrante->codigo_familiar;
        $this->esLGBT = $migrante->es_lgbt;
        $this->tipoSangre = $migrante->tipo_sangre;



        $this->situacionMigratoria = $expediente->situacionMigratoria->situacion_migratoria;
        $this->fechaIngreso = $expediente->fecha_ingreso
            ? Carbon::parse($expediente->fecha_ingreso)->format('d-m-Y')
            : '';

        $this->necesidades = $expediente->necesidades->pluck('necesidad')->join(', ');
        $this->discapacidades = $expediente->discapacidades->pluck('discapacidad')->join(', ');
        $this->observacion = $expediente->observacion;

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
