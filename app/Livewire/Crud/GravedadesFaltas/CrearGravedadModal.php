<?php

namespace App\Livewire\Crud\GravedadesFaltas;

use App\Livewire\Components\ContentTable;
use App\Models\GravedadFalta;
use Livewire\Component;

class CrearGravedadModal extends Component
{
    public $Gravedad;
    public $idModal;

    public function mount($idModal)
    {
        $this->idModal = $idModal;
    }

    public function create()
    {
        $validated = $this->validate([
            'Gravedad' => 'required',
        ]);

        $gravedad = new GravedadFalta();
        $gravedad->gravedad_falta = $validated['Gravedad'];
        $gravedad->save();

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
        $this->Gravedad = '';
    }

    public function render()
    {
        return view('livewire.crud.gravedades-faltas.crear-gravedad-modal');
    }
}
