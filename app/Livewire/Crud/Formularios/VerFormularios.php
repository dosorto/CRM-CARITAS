<?php

namespace App\Livewire\Crud\Formularios;

use App\Models\Expediente;
use App\Models\Migrante;
use Livewire\Component;

class VerFormularios extends Component
{
    // public $nombreCompleto;
    // public $fechaIngreso;
    // public $identificacion;
    // public $tipoIdentificacion;


    public function mount()
    {
        // $expediente = Expediente::find(session('idExpediente') ?? 1);

        // $migrante = Migrante::find($expediente->migrante_id);

        // if($migrante)
        // {

        // }

        // $nombre = $migrante->primer_nombre . ' ' .
        //     $migrante->segundo_nombre . ' ' .
        //     $migrante->primer_apellido . ' ' .
        //     $migrante->segundo_apellido;

        // $this->nombreCompleto = $nombre ?? 'Mario Fernando Carbajal Galo';

        // $this->fechaIngreso = date('d-m-Y') ?? '02/09/2009';
        // $this->identificacion = $migrante->numero_identificacion ?? '0601200303381';
        // $this->tipoIdentificacion = $migrante->tipo_identificacion ?? 'Pasaporte';
    }

    public function render()
    {
        return view('livewire.crud.formularios.ver-formularios');
    }
}
