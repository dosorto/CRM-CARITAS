<?php

namespace App\Livewire\Crud\Categorias;

use App\Models\Categoria;
use Livewire\Component;

class CrearCategoriaModal extends Component
{
    public $Nombre;
    public $idModal;

    public function create()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
        ]);

        $nueva_categoria = new Categoria;

        $nueva_categoria->nombre_categoria = $validated['Nombre'];

        $nueva_categoria->save();
        
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-created');
    }

    public function mount($idModal)
    {
        $this->initForm();
        $this->idModal = $idModal;
    }

    public function render()
    {
        return view('livewire.crud.categorias.crear-categoria-modal');
    }

    public function initForm(){
        $this->Nombre = '';
    }
}
