<?php

namespace App\Livewire\Crud\Paises;

use App\Models\Pais;
use Livewire\Component;

class EliminarPaisModal extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        return view('livewire.crud.paises.eliminar-pais-modal')
            ->with('pais', Pais::find($this->id));
    }
}
