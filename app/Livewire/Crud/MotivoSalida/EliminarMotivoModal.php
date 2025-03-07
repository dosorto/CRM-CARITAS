<?php

namespace App\Livewire\Crud\MotivoSalida;

use App\Livewire\Components\ContentTable;
use App\Models\MotivoSalidaPais;
use Livewire\Component;
use Livewire\Attributes\On;

class EliminarMotivoModal extends Component
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
            $this->item = MotivoSalidaPais::find($id);
        }
    }

    public function render()
    {
        return view('livewire.crud.motivo-salida.eliminar-motivo-modal');
    }
}
