<?php

namespace App\Livewire\Crud\Necesidades;

use App\Livewire\Components\ContentTable;
use Livewire\Component;

class EditarNecesidadModal extends Component
{
    public $item;
    public $Necesidad;
    public $idModal;
    
    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function  editItem()
    {
        $validated = $this->validate([
            'Necesidad' => 'required',
        ]);

        $Necesidad = $this->item;
        $Necesidad->Necesidad = $validated['Necesidad'];
        $Necesidad->save();

        $this->dispatch('update-delete-modal', id: $Necesidad->id)->to(EliminarNecesidadModal::class);

        $this->dispatch('item-edited')->to(ContentTable::class);

        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->Necesidad = $this->item->necesidad;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }
    public function render()
    {
        return view('livewire.crud.necesidades.editar-necesidad-modal');
    }
}
