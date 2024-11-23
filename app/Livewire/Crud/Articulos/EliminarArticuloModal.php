<?php

namespace App\Livewire\Crud\Articulos;

use App\Livewire\Components\ContentTable;
use Livewire\Component;

class EliminarArticuloModal extends Component
{
    public $item;     // Artículo a eliminar
    public $idModal;  // ID del modal para asociarlo con el botón

    public function deleteItem()
    {
        $this->item->delete();  // Eliminar el artículo
        $this->dispatch('close-modal')->self();  // Emitir evento para cerrar el modal
        $this->dispatch('item-deleted')->to(ContentTable::class);  // Emitir evento para notificar la eliminación
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }

    public function cancelar()
    {
        $this->dispatch('close-modal')->self();  // Emitir evento para cerrar el modal
    }

    public function render()
    {
        return view('livewire.crud.articulos.eliminar-articulo-modal');
    }
}
