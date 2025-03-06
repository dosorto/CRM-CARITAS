<?php

namespace App\Livewire\Crud\Usuarios;

use App\Livewire\Components\ContentTable;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class EliminarUsuarioModal extends Component
{
    public $idModal;
    public $item;

    public function mount($parameters)
    {
        $this->idModal = $parameters['idModal'];
        $this->item = $parameters['item'];
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
            $this->item = User::find($id);
        }
    }

    public function render()
    {
        return view('livewire.crud.usuarios.eliminar-usuario-modal');
    }
}
