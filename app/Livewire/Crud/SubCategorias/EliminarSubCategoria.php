<?php

namespace App\Livewire\Crud\SubCategorias;

use LivewireUI\Modal\ModalComponent;
use App\Models\SubCategoria;

class EliminarSubCategoria extends ModalComponent
{
    public $nombre_subcategoria;
    public $id;
    public $nombre_categoria;

    public function mount($id)
    {
        $subcategoria = SubCategoria::with('categoria')->find($id);
        $this->id = $id;
        $this->nombre_subcategoria = $subcategoria->nombre_subcategoria;
        $this->nombre_categoria = $subcategoria->categoria->nombre_categoria;

    }

    public function eliminar()
    {
        $subcategoria = SubCategoria::find($this->id);

        if ($subcategoria) {
            $subcategoria->delete();
        }

        $this->closeModal();
        $this->dispatch('subcategoria-eliminada');
    }

    public function render()
    {
        return view('livewire.crud.sub-categorias.eliminar-sub-categoria')
            ->with('nombre_subcategoria', $this->nombre_subcategoria);
    }
}
