<?php

namespace App\Livewire\Crud\SubCategorias;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\SubCategoria;

class VerSubCategorias extends Component
{
    use WithPagination;

    // Variable para filtrar datos
    public $texto_busqueda = '';

    public function filtrarDatos()
    {
        return SubCategoria::with('categoria')->where('nombre_subcategoria', 'like', '%' . $this->texto_busqueda . '%')->paginate(5);
    }

    public function render()
    {
        $datos = $this->filtrarDatos();
        return view('livewire.crud.sub-categorias.ver-sub-categorias')
            ->with('datos', $datos);
    }

    #[On('subcategoria-creada')] 
    public function creada() {}

    #[On('subcategoria-editada')] 
    public function editada($id) {}

    #[On('subcategoria-eliminada')] 
    public function eliminada() {}
}
