<?php

namespace App\Livewire\Crud\SubCategorias;

use App\Livewire\Components\ContentTable;
use App\Models\SubCategoria;
use Livewire\Attributes\On;
use Livewire\Component;

class EliminarSubCategoriaModal extends Component
{
    public $item;
    public $idModal;

    public function deleteItem()
    {
        $this->item->delete();
        $this->dispatch('item-deleted')->to(ContentTable::class);
        $this->dispatch('close-modal')->self();
    }


    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }
    
    public function render()
    {
        return view('livewire.crud.sub-categorias.eliminar-sub-categoria-modal');
    }

    #[On('update-delete-modal')]
    public function updateData($id)
    {
        if ($this->item->id === $id)
        {
            $this->item = SubCategoria::find($id);
        }
    }
}
