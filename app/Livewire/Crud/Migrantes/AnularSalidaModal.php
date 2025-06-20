<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Expediente;
use App\Models\Migrante;
use Livewire\Component;

class AnularSalidaModal extends Component
{
    public $migranteId;
    public $nombre;
    public $identificacion;

    public function anularSalida()
    {
        $expediente = Expediente::where('migrante_id', $this->migranteId)->first();
        $expediente->fecha_salida = null;
        $expediente->save();
        $this->dispatch('close-modal')->self();
        $this->dispatch('salida-anulada')->to(VerMigrantes::class);
    }

    public function mount($migranteId)
    {
        $this->migranteId = $migranteId;
        $migrante = Migrante::find($migranteId);
        $this->nombre = $migrante->primer_nombre . ' ' . $migrante->primer_apellido;
        $this->identificacion = $migrante->numero_identificacion ?? '<desconocido>';
    }

    public function render()
    {
        return view('livewire.crud.migrantes.anular-salida-modal');
    }
}
