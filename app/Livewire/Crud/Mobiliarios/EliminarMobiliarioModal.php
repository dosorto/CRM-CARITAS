<?php

namespace App\Livewire\Crud\Mobiliarios;

use Livewire\Component;

class EliminarMobiliarioModal extends Component
{
    public $item;
    public $idModal;

    public function deleteItem()
    {
        $this->item->delete();
        $this->dispatch('cerrar-modal');
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
        return view('livewire.crud.mobiliarios.eliminar-mobiliario-modal');
    }
}
