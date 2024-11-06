<?php

namespace App\Livewire\Crud\Fronteras;

use App\Livewire\Components\ContentTable;
use Livewire\Component;

class EditarFronteraModal extends Component
{
    public $item;
    public $Frontera;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.crud.fronteras.editar-frontera-modal');
    }

    public function  editItem()
    {
        $validated = $this->validate([
            'Frontera' => 'required',
        ]);

        $frontera = $this->item;
        $frontera->frontera = $validated['Frontera'];
        $frontera->save();

        $this->dispatch('update-delete-modal', id: $frontera->id)->to(EliminarFronteraModal::class);

        $this->dispatch('item-edited')->to(ContentTable::class);

        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->Frontera = $this->item->frontera;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }
}
