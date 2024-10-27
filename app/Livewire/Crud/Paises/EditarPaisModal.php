<?php

namespace App\Livewire\Crud\Paises;

use Livewire\Component;

class EditarPaisModal extends Component
{
    public $Nombre;
    public $Alfa3;
    public $Numerico;
    public $item;
    public $idModal;

    public function  editItem()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'Alfa3' => 'required|size:3',
            'Numerico' => 'required|size:3',
        ]);

        $paisEdited = $this->item;

        $paisEdited->nombre_pais = $validated['Nombre'];
        $paisEdited->codigo_alfa3 = $validated['Alfa3'];
        $paisEdited->codigo_numerico = $validated['Numerico'];

        $paisEdited->save();

        $this->dispatch('item-edited', id: $paisEdited->id);
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal');
    }

    public function resetForm()
    {
        $this->Nombre = $this->item->nombre_pais;
        $this->Alfa3 = $this->item->codigo_alfa3;
        $this->Numerico = $this->item->codigo_numerico;
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.crud.paises.editar-pais-modal');
    }
}
