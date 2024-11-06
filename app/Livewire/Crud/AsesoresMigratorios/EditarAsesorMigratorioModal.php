<?php

namespace App\Livewire\Crud\AsesoresMigratorios;

use App\Livewire\Components\ContentTable;
use Livewire\Component;

class EditarAsesorMigratorioModal extends Component
{
    public $item;
    public $Asesor;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.crud.asesores-migratorios.editar-asesor-migratorio-modal');
    }

    public function  editItem()
    {
        $validated = $this->validate([
            'Asesor' => 'required',
        ]);

        $discapacidad = $this->item;
        $discapacidad->asesor_migratorio = $validated['Asesor'];
        $discapacidad->save();

        $this->dispatch('update-delete-modal', id: $discapacidad->id)->to(EliminarAsesorMigratorioModal::class);

        $this->dispatch('item-edited')->to(ContentTable::class);

        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->Asesor = $this->item->asesor_migratorio;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }
}
