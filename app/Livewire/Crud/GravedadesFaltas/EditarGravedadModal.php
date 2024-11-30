<?php

namespace App\Livewire\Crud\GravedadesFaltas;

use App\Livewire\Components\ContentTable;
use App\Models\GravedadFalta;
use Livewire\Component;

class EditarGravedadModal extends Component
{
    public $item;
    public $Gravedad;
    public $idModal;
    
    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function  editItem()
    {
        $validated = $this->validate([
            'Gravedad' => 'required',
        ]);

        $Gravedad = $this->item;
        $Gravedad->gravedad_falta = $validated['Gravedad'];
        $Gravedad->save();

        $this->dispatch('update-delete-modal', id: $Gravedad->id)->to(EliminarGravedadModal::class);

        $this->dispatch('item-edited')->to(ContentTable::class);

        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->Gravedad = $this->item->Gravedad;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }

    public function render()
    {
        return view('livewire.crud.gravedades-faltas.editar-gravedad-modal');
    }
}
