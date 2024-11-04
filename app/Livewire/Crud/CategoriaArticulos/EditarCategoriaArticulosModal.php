<?php

namespace App\Livewire\Crud\CategoriaArticulos;

use Livewire\Component;

class EditarCategoriaArticulosModal extends Component
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

        $nueva_categoria->name_categoria = $validated['Nombre'];

        $nueva_categoria->save();

        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }

    public function initForm()
    {
        $this->Nombre = $this->item->name_categoria;
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.categoria-articulos.editar-categoria-articulos-modal');
    }
}
