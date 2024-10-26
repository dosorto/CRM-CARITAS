<?php

namespace App\Livewire\Crud\SubCategorias;

use App\Models\SubCategoria;
use App\Models\Categoria;
use LivewireUI\Modal\ModalComponent;


class EditarSubCategoria extends ModalComponent
{
    public $nombre_subcategoria;
    public $categoria_id;
    public $id;
    public $categorias;

    public function mount($id)
    {
        $this->categorias = Categoria::all();
        $subcategoria = SubCategoria::find($id);
        $this->id = $id;
        $this->nombre_subcategoria = $subcategoria->nombre_subcategoria;
        $this->categoria_id = $subcategoria->categoria_id;

    }

    public function editar()
    {
        $nueva_subcategoria = SubCategoria::find($this->id);

        $nueva_subcategoria->nombre_subcategoria = $this->nombre_subcategoria;
        $nueva_subcategoria->categoria_id = $this->categoria_id;

        $nueva_subcategoria->save();
        
        $this->dispatch('subcategoria-editada', id: $nueva_subcategoria->id);

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.crud.sub-categorias.editar-sub-categoria');
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;   
    }
}
