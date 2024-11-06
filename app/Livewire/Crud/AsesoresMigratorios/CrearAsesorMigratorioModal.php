<?php

namespace App\Livewire\Crud\AsesoresMigratorios;

use Livewire\Component;
use App\Models\AsesorMigratorio;
use App\Livewire\Components\ContentTable;

class CrearAsesorMigratorioModal extends Component
{
    public $Asesor;
    public $idModal;

    public function mount($idModal)
    {
        $this->idModal = $idModal;
    }

    public function create()
    {
        $validated = $this->validate([
            'Discapacidad' => 'required',
        ]);

        $discapacidad = new AsesorMigratorio();
        $discapacidad->asesor_migratorio = $validated['Discapacidad'];
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
        $this->Asesor = '';
    }
    public function render()
    {
        return view('livewire.crud.asesores-migratorios.crear-asesor-migratorio-modal');
    }
}
