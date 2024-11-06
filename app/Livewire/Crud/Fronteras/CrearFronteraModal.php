<?php

namespace App\Livewire\Crud\Fronteras;

use App\Livewire\Components\ContentTable;
use App\Models\Frontera;
use Livewire\Component;

class CrearFronteraModal extends Component
{
    public $Frontera;
    public $idModal;

    public function mount($idModal)
    {
        $this->idModal = $idModal;
    }

    public function render()
    {
        return view('livewire.crud.fronteras.crear-frontera-modal');
    }

    public function create()
    {
        $validated = $this->validate([
            'Frontera' => 'required',
        ]);

        $frontera = new Frontera();
        $frontera->frontera = $validated['Frontera'];
        $frontera->save();

        $this->dispatch('item-created')->to(ContentTable::class);

        $this->closeModal();
    }

    public function closeModal()
    {
        $this->dispatch('close-modal')->self();
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->Frontera = '';
    }
}
