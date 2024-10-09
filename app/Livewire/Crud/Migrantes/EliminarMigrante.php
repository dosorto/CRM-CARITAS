<?php

namespace App\Livewire\Crud\Migrantes;

// use Livewire\Component;
// use Livewire\Attributes\Layout;

use App\Models\Migrante;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EliminarMigrante extends ModalComponent
{
    public $id;
    public $nombre_completo;
    public $numero_identificacion;
    public $tipo_identificacion;
    public $codigo_familiar;
    public $pais;

    public function mount($id)
    {
        
        $migrante = Migrante::find($id);
        
        $this->id = $migrante->id;

        $this->nombre_completo =
            $migrante->primer_nombre . ' ' .
            $migrante->segundo_nombre . ' ' .
            $migrante->primer_apellido . ' ' .
            $migrante->segundo_apellido;

        $this->numero_identificacion = $migrante->numero_identificacion;
        $this->tipo_identificacion = $migrante->tipo_identificacion;
        $this->codigo_familiar = $migrante->codigo_familiar;
        $this->pais = $migrante->pais->nombre_pais;
    }

    public function eliminar()
    {
        // dump($this->id);
        // dd(1);
        $migrante_a_eliminar = Migrante::find($this->id);

        $migrante_a_eliminar->delete();

        $this->closeModal();
        $this->dispatch('migrante-eliminado');
    }

    public function render()
    {
        return view('livewire.crud.migrantes.eliminar-migrante');
    }
}
