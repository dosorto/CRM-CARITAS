<?php

namespace App\Livewire\Crud\Departamentos;

use Livewire\Component;

class EliminarDepartamentoModal extends Component
{
    public $item;
    public $idModal;

    public function deleteItem()
    {
        $this->item->delete();
        $this->dispatch('close-modal');
        $this->dispatch('item-deleted');
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }

    public function initInfo(){}

    public function render()
    {
        return view('livewire.crud.departamentos.eliminar-departamento-modal');
    }
}
