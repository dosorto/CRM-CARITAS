<?php

namespace App\Livewire\Crud\SituacionesMigratorias;

use Livewire\Component;
use App\Livewire\Components\ContentTable;

class EditarSituacionMigratoriaModal extends Component
{
    public $item;
    public $Situacion;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.crud.situaciones-migratorias.editar-situacion-migratoria-modal');
    }

    public function  editItem()
    {
        $validated = $this->validate([
            'Situacion' => 'required',
        ]);

        $situacion = $this->item;
        $situacion->situacion_migratoria = $validated['Situacion'];
        $situacion->save();

        $this->dispatch('update-delete-modal', id: $situacion->id)->to(EliminarSituacionMigratoriaModal::class);

        $this->dispatch('item-edited')->to(ContentTable::class);

        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->Situacion = $this->item->situacion_migratoria;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }
}
