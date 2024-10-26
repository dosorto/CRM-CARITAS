<?php

namespace App\Livewire\Crud\Ciudades;

use Livewire\Component;

class EliminarCiudadModal extends Component
{
    public $ciudad;

    public function deleteItem()
    {
        $this->ciudad->delete();
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-deleted');
    }

    public function initInfo(){}

    public function mount($parameters)
    {
        $this->ciudad = $parameters['item'];
    }

    public function render()
    {
        return view('livewire.crud.ciudades.eliminar-ciudad-modal');
    }
}
