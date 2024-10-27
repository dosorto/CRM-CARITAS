<?php

namespace App\Livewire\Crud\Paises;

use App\Models\Pais;
use Livewire\Attributes\On;
use Livewire\Component;

class EliminarPaisModal extends Component
{
    public $item;
    public $idModal;

    public function deleteItem()
    {
        $this->item->delete();
        $this->dispatch('item-deleted');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal');
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }

    #[On('item-edited')]
    public function udpateData($id)
    {
        $this->item = Pais::find($id);
    }

    public function render()
    {
        return view('livewire.crud.paises.eliminar-pais-modal');
    }
}
