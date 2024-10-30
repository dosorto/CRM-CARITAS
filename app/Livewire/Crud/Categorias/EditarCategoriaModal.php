<?php

namespace App\Livewire\Crud\Categorias;

use App\Livewire\Components\ContentTable;
use Livewire\Component;

class EditarCategoriaModal extends Component
{
    public $Nombre;
    public $idModal;
    public $item;

    public function editItem()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
        ]);

        $nueva_categoria = $this->item;
        $nueva_categoria->nombre_categoria = $validated['Nombre'];
        $nueva_categoria->save();
        
        $this->dispatch('item-edited')->to(ContentTable::class);
        $this->dispatch('cerrar-modal')->self();
    }
    
    public function closeModal()
    {
        $this->Nombre = $this->item->nombre_categoria;
        $this->dispatch('cerrar-modal')->self();
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->Nombre = $this->item->nombre_categoria;
    }

    public function render()
    {
        return view('livewire.crud.categorias.editar-categoria-modal');
    }
}
