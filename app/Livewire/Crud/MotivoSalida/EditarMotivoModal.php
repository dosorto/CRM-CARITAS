<?php

namespace App\Livewire\Crud\MotivoSalida;

use App\Livewire\Components\ContentTable;

use Livewire\Component;

class EditarMotivoModal extends Component
{
    public $item;
    public $Motivo;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function editItem()
    {
        $validated = $this->validate([
            'Motivo' => 'required',
        ]);

        $motivo = $this->item;
        $motivo->motivo_salida_pais = $validated['Motivo'];
        $motivo->save();

        $this->dispatch('update-delete-modal', id: $motivo->id)->to(EliminarMotivoModal::class);

        $this->dispatch('item-edited')->to(ContentTable::class);

        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->Motivo = $this->item->motivo_salida_pais;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }

    public function render()
    {
        return view('livewire.crud.motivo-salida.editar-motivo-modal');
    }
}
