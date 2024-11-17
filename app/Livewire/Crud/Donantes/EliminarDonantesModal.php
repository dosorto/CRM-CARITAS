<?php

namespace App\Livewire\Crud\Donantes;

use Livewire\Component;

class EliminarDonantesModal extends Component
{
    public $item;
    public $idModal;

    public function deleteItem()
    {
        $this->item->delete();  
        $this->dispatch('cerrar-modal'); 
        $this->dispatch('item-deleted'); 
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }
    public function initInfo() {}
    public function render()
    {
        return view('livewire.crud.donantes.eliminar-donantes-modal');
    }
}
