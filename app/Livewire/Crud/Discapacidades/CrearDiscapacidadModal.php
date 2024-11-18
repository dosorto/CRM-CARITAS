<?php

namespace App\Livewire\Crud\Discapacidades;
use App\Models\Discapacidad;
use App\Livewire\Components\ContentTable;

use Livewire\Component;

class CrearDiscapacidadModal extends Component
{
    public $Discapacidad;
    public $idModal;

    public function mount($idModal)
    {
        $this->idModal = $idModal;
    }

    public function render()
    {
        return view('livewire.crud.discapacidades.crear-discapacidad-modal');
    }

    public function create()
    {
        $validated = $this->validate([
            'Discapacidad' => 'required',
        ]);

        $discapacidad = new Discapacidad();
        $discapacidad->discapacidad = $validated['Discapacidad'];
        $discapacidad->save();

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
        $this->Discapacidad = '';
    }
}
