<?php

namespace App\Livewire\Crud\Departamentos;

use App\Models\Departamento;
use Livewire\Component;

class EliminarDepartamentoModal extends Component
{
    public $depto;

    public function deleteItem()
    {
        $this->depto->delete();
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-deleted');
    }

    public function mount($parameters)
    {
        $this->depto = $parameters['item'];
    }

    public function initInfo(){}

    public function render()
    {
        return view('livewire.crud.departamentos.eliminar-departamento-modal');
    }
}
