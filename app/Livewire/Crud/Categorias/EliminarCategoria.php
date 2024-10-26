<?php

namespace App\Livewire\Crud\Categorias;

use App\Models\Categoria;
use LivewireUI\Modal\ModalComponent;

class EliminarCategoria extends ModalComponent
{
    public $nombre_categoria;
    public $id;

    public function mount($id)
    {
        $categoria = Categoria::find($id);

        $this->id = $id;
        $this->nombre_categoria = $categoria->nombre_categoria;
    }

    public function eliminar()
    {
        $categoria = Categoria::find($this->id);

        if ($categoria) {
            $categoria->delete();
        }

        $this->closeModal();
        $this->dispatch('categoria-eliminada');
    }

    public function render()
    {
        return view('livewire.crud.categorias.eliminar-categoria')
            ->with('nombre_categoria', $this->nombre_categoria);
    }
}
