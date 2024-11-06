<?php

namespace App\Livewire\Crud\Discapacidades;

use Livewire\Component;
use App\Livewire\Components\ContentTable;

class EditarDiscapacidadModal extends Component
{
    public $item;
    public $Discapacidad;
    public $idModal;
    
    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    
    public function render()
    {
        return view('livewire.crud.discapacidades.editar-discapacidad-modal');
    }

    public function  editItem()
    {
        $validated = $this->validate([
            'Discapacidad' => 'required',
        ]);

        $discapacidad = $this->item;
        $discapacidad->discapacidad = $validated['Discapacidad'];
        $discapacidad->save();

        $this->dispatch('update-delete-modal', id: $discapacidad->id)->to(EliminarDiscapacidadModal::class);

        $this->dispatch('item-edited')->to(ContentTable::class);

        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->Discapacidad = $this->item->discapacidad;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }
}
