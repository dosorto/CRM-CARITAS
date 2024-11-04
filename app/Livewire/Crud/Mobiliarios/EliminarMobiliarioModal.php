<?php

namespace App\Livewire\Crud\Mobiliarios;

use App\Livewire\Components\ContentTable;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Mobiliario;

class EliminarMobiliarioModal extends Component
{
    public $item;
    public $idModal;

    public function deleteItem()
    {
        $this->item->delete();
        $this->dispatch('close-modal');
        $this->dispatch('item-deleted')->to(ContentTable::class);
    }

    public function initInfo(){}

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }

    #[On('update-delete-modal')]
    public function udpateData($id)
    {
        // verifica si el id del item del modal es igual al id del item editado
        // para evitar que todos los modales de eliminar se actualicen con los datos del unico item editado.
        if ($this->item->id === $id) {
            $this->item = Mobiliario::find($id);
        }
    }
    public function render()
    {
        return view('livewire.crud.mobiliarios.eliminar-mobiliario-modal');
    }
}
