<?php

namespace App\Livewire\Crud\Ciudades;

use Livewire\Component;

class EliminarCiudadModal extends Component
{
    public $item;
    public $idModal;

    public function deleteItem()
    {
        $this->item->delete();
        $this->dispatch('close-modal');
        $this->dispatch('item-deleted');
    }

    public function initInfo(){}

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }

    public function render()
    {
        return view('livewire.crud.ciudades.eliminar-ciudad-modal');
    }
}
