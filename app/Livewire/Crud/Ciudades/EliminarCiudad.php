<?php

namespace App\Livewire\Crud\Ciudades;

use Livewire\Component;
use App\Models\Ciudad;
use LivewireUI\Modal\ModalComponent;

class EliminarCiudad extends ModalComponent
{

    public $id;
    public $nombre_ciudad;

    public function mount($id)
    {
        $this->id = $id;

        $ciudad = Ciudad::find($id);
        $this->nombre_ciudad = $ciudad->nombre_ciudad;
    }

    public function eliminar()
    {
        $ciudad = Ciudad::find($this->id);

        if ($ciudad) {
            $ciudad->delete();
        }

        $this->closeModal();
        $this->dispatch('ciudad-eliminada');

    }


    public function render()
    {
        return view('livewire.crud.ciudades.eliminar-ciudad')
            ->with('nombre_ciudad', $this->nombre_ciudad);
    }
}
