<?php

namespace App\Livewire\Crud\SubCategorias;

use App\Models\Categoria;
use App\Models\SubCategoria;
use Livewire\Component;

class CrearSubCategoriaModal extends Component
{
    public $Nombre;
    public $IdCategoria;
    public $categorias;
    public $idModal;


    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->initForm();
    }

    public function create()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'IdCategoria' => 'required',
        ]);

        $nueva_subcategoria = new SubCategoria;

        $nueva_subcategoria->nombre_subcategoria = $validated['Nombre'];
        $nueva_subcategoria->categoria_id = $validated['IdCategoria'];

        $nueva_subcategoria->save();

        $this->dispatch('cerrar-modal');
        $this->dispatch('item-created');
    }

    public function initForm()
    {
        $this->categorias = Categoria::all();
        $this->Nombre = '';
    }

    public function render()
    {
        return view('livewire.crud.sub-categorias.crear-sub-categoria-modal');
    }
}
