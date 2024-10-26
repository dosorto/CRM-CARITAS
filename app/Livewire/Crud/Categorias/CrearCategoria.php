<?php

namespace App\Livewire\Crud\Categorias;

use App\Models\Categoria;
use LivewireUI\Modal\ModalComponent;

class CrearCategoria extends ModalComponent
{
    public $nombre_categoria;

    public function crear()
    {
        $nueva_categoria = new Categoria;

        $nueva_categoria->nombre_categoria = $this->nombre_categoria;

        $nueva_categoria->save();
        
        $this->dispatch('categoria-creada');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.crud.categorias.crear-categoria');
    }
}
