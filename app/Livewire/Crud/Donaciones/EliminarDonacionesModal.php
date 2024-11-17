<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Donacion;
use Livewire\Component;

class EliminarDonacionesModal extends Component
{
    public $item;     // Donación a eliminar
    public $idModal;  // ID del modal para asociarlo con el botón

    // Método para eliminar la donación
    public function deleteItem()
    {
        // Validar si el item existe antes de eliminar
        if ($this->item) {
            $this->item->delete();  // Eliminar la donación
            $this->dispatch('cerrar-modal');  // Emitir evento para cerrar el modal
            $this->dispatch('item-deleted');  // Emitir evento para notificar que la donación fue eliminada
        }
    }

    // Método para inicializar los parámetros
    public function mount($parameters)
    {
        $this->item = $parameters['item'];  // La donación a eliminar
        $this->idModal = $parameters['idModal'];  // ID del modal
    }

    // Renderizar la vista del modal
    public function render()
    {
        return view('livewire.crud.donaciones.eliminar-donaciones-modal');
    }
}
