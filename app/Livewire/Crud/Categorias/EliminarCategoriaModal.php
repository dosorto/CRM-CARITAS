<?php

namespace App\Livewire\Crud\Categorias;

use App\Livewire\Components\ContentTable;
use App\Models\Categoria;
use Livewire\Attributes\On;
use Livewire\Component;

// Documentación más detallada en crud de Paises
class EliminarCategoriaModal extends Component
{
    public $item;
    public $idModal;

    public function deleteItem()
    {
        $this->item->delete();
        $this->dispatch('cerrar-modal')->self();
        $this->dispatch('item-deleted')->to(ContentTable::class);
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }
    
    public function render()
    {
        return view('livewire.crud.categorias.eliminar-categoria-modal');
    }

    #[On('update-delete-modal')]
    public function udpateData($id)
    {
        if ($this->item->id === $id) {
            $this->item = Categoria::find($id);
        }
    }
}
