<?php

namespace App\Livewire\Crud\AsesoresMigratorios;

use Livewire\Component;
use App\Models\AsesorMigratorio;
use App\Livewire\Components\ContentTable;
use App\Livewire\Crud\Migrantes\Form\DatosMigratoriosStep;

class CrearAsesorMigratorioModal extends Component
{
    public $Asesor;
    public $idModal;

    public $buttonLabel;

    public function mount($idModal, $buttonLabel = 'Añadir')
    {
        $this->idModal = $idModal;
        $this->buttonLabel = $buttonLabel;
    }

    public function create()
    {
        $validated = $this->validate([
            'Asesor' => 'required',
        ]);

        $asesor = new AsesorMigratorio();
        $asesor->asesor_migratorio = $validated['Asesor'];
        $asesor->save();

        $this->dispatch('item-created')->to(ContentTable::class);
        $this->dispatch('asesor-created', newId: $asesor->id)->to(DatosMigratoriosStep::class);

        $this->closeModal();
    }

    public function closeModal()
    {
        $this->dispatch('close-modal')->self();
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->Asesor = '';
    }
    public function render()
    {
        return view('livewire.crud.asesores-migratorios.crear-asesor-migratorio-modal');
    }
}
