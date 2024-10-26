<?php

namespace App\Livewire\Crud\SubCategorias;

use App\Models\Categoria;
use App\Models\SubCategoria;
use LivewireUI\Modal\ModalComponent;

class CrearSubCategoria extends ModalComponent
{
    public $nombre_subcategoria;
    public $categoria_id;
    public $categorias;

    public function mount()
    {
        // Cargar las categorías existentes
        $this->categorias = Categoria::all();
    }

    public function crear()
    {
        $nueva_subcategoria = new SubCategoria;

        $nueva_subcategoria->nombre_subcategoria = $this->nombre_subcategoria;
        $nueva_subcategoria->categoria_id = $this->categoria_id;

        $nueva_subcategoria->save();
        
        $this->dispatch('subcategoria-creada');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.crud.sub-categorias.crear-sub-categoria');
    }
}
