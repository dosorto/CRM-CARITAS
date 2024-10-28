<?php

namespace App\Livewire\Crud\Articulos;

use Livewire\Component;

class EliminarArticuloModal extends Component
{
    public $item;     // Artículo a eliminar
    public $idModal;  // ID del modal para asociarlo con el botón

    public function deleteItem()
    {
        $this->item->delete();  // Eliminar el artículo
        $this->dispatch('cerrar-modal');  // Emitir evento para cerrar el modal
        $this->dispatch('item-deleted');  // Emitir evento para notificar la eliminación
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }

    public function initInfo() {}

    public function render()
    {
        return view('livewire.crud.articulos.eliminar-articulo-modal');
    }
}

