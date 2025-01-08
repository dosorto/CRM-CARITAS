<?php

namespace App\Livewire\Crud\SituacionesMigratorias;

use App\Livewire\Components\ContentTable;
use App\Livewire\Crud\Migrantes\Form\DatosMigratoriosStep;
use App\Models\SituacionMigratoria;
use Livewire\Component;

class CrearSituacionMigratoriaModal extends Component
{
    public $Situacion;
    public $idModal;
    public $buttonLabel;

    public function mount($idModal, $buttonLabel = 'Añadir')
    {
        $this->idModal = $idModal;
        $this->buttonLabel = $buttonLabel;
    }

    public function render()
    {
        return view('livewire.crud.situaciones-migratorias.crear-situacion-migratoria-modal');
    }

    public function create()
    {
        $validated = $this->validate([
            'Situacion' => 'required',
        ]);

        $situacion = new SituacionMigratoria();
        $situacion->situacion_migratoria = $validated['Situacion'];
        $situacion->save();

        $this->dispatch('item-created')->to(ContentTable::class);
        $this->dispatch('situacion-created', newId: $situacion->id)->to(DatosMigratoriosStep::class);

        $this->closeModal();
    }

    public function closeModal()
    {
        $this->dispatch('close-modal')->self();
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->Situacion = '';
    }
}
