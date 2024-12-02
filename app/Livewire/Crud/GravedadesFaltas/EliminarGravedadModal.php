<?php

namespace App\Livewire\Crud\GravedadesFaltas;

use App\Livewire\Components\ContentTable;
use App\Models\GravedadFalta;
use Livewire\Attributes\On;
use Livewire\Component;

class EliminarGravedadModal extends Component
{
    public $item;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }
    
    public function deleteItem()
    {
        $this->item->delete();

        $this->dispatch('item-deleted')->to(ContentTable::class);
        
        $this->dispatch('close-modal')->self();
    }

    #[On('update-delete-modal')]
    public function udpateData($id)
    {
        if ($this->item->id === $id)
        {
            $this->item = GravedadFalta::find($id);
        }
    }

    public function render()
    {
        return view('livewire.crud.gravedades-faltas.eliminar-gravedad-modal');
    }
}
