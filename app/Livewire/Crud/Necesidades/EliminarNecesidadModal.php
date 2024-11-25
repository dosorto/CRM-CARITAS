<?php

namespace App\Livewire\Crud\Necesidades;

use App\Livewire\Components\ContentTable;
use App\Models\Necesidad;
use Livewire\Component;
use Livewire\Attributes\On;

class EliminarNecesidadModal extends Component
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
            $this->item = Necesidad::find($id);
        }
    }
    public function render()
    {
        return view('livewire.crud.necesidades.eliminar-necesidad-modal');
    }
}
