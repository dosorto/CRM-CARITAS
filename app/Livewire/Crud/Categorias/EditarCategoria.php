<?php

namespace App\Livewire\Crud\Categorias;

use App\Models\Categoria;
use LivewireUI\Modal\ModalComponent;

class EditarCategoria extends ModalComponent
{
    public $nombre_categoria;
    public $id;

    public function mount($id)
    {
        $categoria = Categoria::find($id);
        $this->id = $id;
        $this->nombre_categoria = $categoria->nombre_categoria;
    }

    public function editar()
    {
        $nueva_categoria = Categoria::find($this->id);

        $nueva_categoria->nombre_categoria = $this->nombre_categoria;

        $nueva_categoria->save();
        
        $this->dispatch('categoria-editada', id: $nueva_categoria->id);

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.crud.categorias.editar-categoria');
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;   
    }

}
