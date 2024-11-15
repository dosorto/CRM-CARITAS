<?php

namespace App\Livewire\Crud\Donantes;

use Livewire\Component;

class EliminarDonantesModal extends Component
{
    public $item;
    public $idModal;

    public function deleteItem()
    {
        $this->item->delete();  // Eliminar el donante
        $this->dispatch('cerrar-modal');  // Emitir evento para cerrar el modal
        $this->dispatch('item-deleted');  // Emitir evento para notificar la eliminación
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }

    public function render()
    {
        return view('livewire.crud.donantes.eliminar-donantes-modal');
    }
}
