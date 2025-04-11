<?php

namespace App\Livewire\Crud\Articulos;

use App\Livewire\Components\ContentTable;
use Livewire\Component;

class EliminarArticuloModal extends Component
{
    public $item;     // Artículo a eliminar
    public $idModal;  // ID del modal para asociarlo con el botón

    // public function deleteItem()
    // {
    //     $this->item->delete();  // Eliminar el artículo
    //     $this->dispatch('close-modal')->self();  // Emitir evento para cerrar el modal
    //     $this->dispatch('item-deleted')->to(ContentTable::class);  // Emitir evento para notificar la eliminación
    // }

    public function deleteItem()
    {
        // Verifica si hay registros en la tabla pivote donacion_articulo con este artículo
        if ($this->item->donaciones()->exists()) {
            $this->dispatch('error', 'No se puede eliminar este artículo porque está relacionado con una o más donaciones.');
            // $this->dispatch('cerrar-modal');
            return;
        }

        $this->item->delete();
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-deleted');
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