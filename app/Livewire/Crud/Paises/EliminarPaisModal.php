<?php

namespace App\Livewire\Crud\Paises;

use App\Models\Pais;
use Livewire\Component;

class EliminarPaisModal extends Component
{
    public $pais;

    public function deletepais()
    {
        $this->pais->delete();
    }

    public function mount($parameters)
    {
        $this->pais = $parameters['item'];
    }

    public function render()
    {
        return view('livewire.crud.paises.eliminar-pais-modal')
            ->with('pais', $this->pais);
    }
}
