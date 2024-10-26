<?php

namespace App\Livewire\Crud\Paises;

use App\Models\Pais;
use Livewire\Component;
use Livewire\Attributes\On;

class EditarPaisModal extends Component
{
    public $Nombre;
    public $Alfa3;
    public $Numerico;
    public $pais;

    public function  editItem()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'Alfa3' => 'required|size:3',
            'Numerico' => 'required|size:3',
        ]);

        $paisEdited = $this->pais;

        $paisEdited->nombre_pais = $validated['Nombre'];
        $paisEdited->codigo_alfa3 = $validated['Alfa3'];
        $paisEdited->codigo_numerico = $validated['Numerico'];

        $paisEdited->save();
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }

    public function initForm()
    {
        $this->Nombre = $this->pais->nombre_pais;
        $this->Alfa3 = $this->pais->codigo_alfa3;
        $this->Numerico = $this->pais->codigo_numerico;
    }

    public function mount($parameters)
    {
        $this->pais = $parameters['item'];
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.paises.editar-pais-modal');
    }
}
