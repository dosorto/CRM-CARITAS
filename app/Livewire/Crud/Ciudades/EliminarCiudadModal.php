<?php

namespace App\Livewire\Crud\Ciudades;

use App\Livewire\Components\ContentTable;
use App\Models\Ciudad;
use Livewire\Component;
use Livewire\Attributes\On;

class EliminarCiudadModal extends Component
{
    public $item;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }

    public function render()
    {
        return view('livewire.crud.ciudades.eliminar-ciudad-modal');
    }

    public function deleteItem()
    {
        $this->item->delete();
        $this->dispatch('item-deleted')->to(ContentTable::class);
        $this->dispatch('close-modal')->self();
    }

    // Este evento se envía cuando se edita el registro en específico
    #[On('update-delete-modal')]
    public function udpateData($id)
    {
        // verifica si el id del item del modal es igual al id del item editado
        // para evitar que todos los modales de eliminar se actualicen con los datos del unico item editado.
        if ($this->item->id === $id) {
            $this->item = Ciudad::find($id);
        }
    }
}
