<?php

namespace App\Livewire\Crud\Categorias;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Categoria;

class VerCategorias extends Component
{
    use WithPagination;

    // Variable para filtrar datos
    public $texto_busqueda = '';

    public function filtrarDatos()
    {
        return Categoria::where('nombre_categoria', 'like', '%' . $this->texto_busqueda . '%')->paginate(5);
    }

    public function render()
    {
        $datos = $this->filtrarDatos();
        return view('livewire.crud.categorias.ver-categorias')
            ->with('datos', $datos);
    }

    #[On('categoria-creada')] 
    public function creada() {}

    #[On('categoria-editada')] 
    public function editada($id) {}

    #[On('categoria-eliminada')] 
    public function eliminada() {}
}
