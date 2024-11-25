<?php

namespace App\Livewire\Crud\Necesidades;

use App\Livewire\Components\ContentTable;
use App\Models\Necesidad;
use Livewire\Component;

class CrearNecesidadModal extends Component
{
    public $Necesidad;
    public $idModal;

    public function mount($idModal)
    {
        $this->idModal = $idModal;
    }

    public function create()
    {
        $validated = $this->validate([
            'Necesidad' => 'required',
        ]);

        $necesidad = new Necesidad();
        $necesidad->necesidad = $validated['Necesidad'];
        $necesidad->save();

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
        $this->Necesidad = '';
    }
    public function render()
    {
        return view('livewire.crud.necesidades.crear-necesidad-modal');
    }
}
