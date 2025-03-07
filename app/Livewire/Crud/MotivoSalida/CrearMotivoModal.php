<?php

namespace App\Livewire\Crud\MotivoSalida;

use App\Livewire\Components\ContentTable;
// use App\Livewire\Crud\Migrantes\Form\MotivosStep;
use App\Models\MotivoSalidaPais;

use Livewire\Component;

class CrearMotivoModal extends Component
{
    public $Motivo;
    public $idModal;

    public function mount($idModal)
    {
        $this->idModal = $idModal;
    }

    public function create()
    {
        $validated = $this->validate([
            'Motivo' => 'required',
        ]);

        $motivo = new MotivoSalidaPais();
        $motivo->motivo_salida_pais = $validated['Motivo'];
        $motivo->save();

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
        $this->Motivo = '';
    }
    public function render()
    {
        return view('livewire.crud.motivo-salida.crear-motivo-modal');
    }
}
