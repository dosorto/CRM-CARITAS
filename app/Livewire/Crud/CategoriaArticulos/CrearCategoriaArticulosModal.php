<?php

namespace App\Livewire\Crud\CategoriaArticulos;

use App\Models\CategoriaArticulo;
use Livewire\Component;

class CrearCategoriaArticulosModal extends Component
{
    public $Name;
    public $idModal;

    public function create()
    {
        $validated = $this->validate([
            'Name' => 'required',
        ]);

        $nueva_categoria = new CategoriaArticulo();

        $nueva_categoria->name_categoria = $validated['Name'];

        $nueva_categoria->save();

        $this->dispatch('cerrar-modal');
        $this->dispatch('item-created');
    }

    public function mount($idModal)
    {
        $this->initForm();
        $this->idModal = $idModal;
    }

    public function initForm(){
        $this->Name = '';
    }


    public function render()
    {
        return view('livewire.crud.categoria-articulos.crear-categoria-articulos-modal');
    }
}
