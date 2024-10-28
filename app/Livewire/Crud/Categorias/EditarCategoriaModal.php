<?php

namespace App\Livewire\Crud\Categorias;

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
        
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }

    public function initForm()
    {
        $this->Nombre = $this->item->nombre_categoria;
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.categorias.editar-categoria-modal');
    }
}
