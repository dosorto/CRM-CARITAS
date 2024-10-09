<?php

namespace App\Livewire\Crud\Paises;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Pais;

class VerPaises extends Component
{
    use WithPagination;

    public $texto_busqueda = '';

    public function filtrarDatos()
    {
        return Pais::where('nombre_pais', 'like', '%' . $this->texto_busqueda . '%')->paginate(5);
    }

    public function render()
    {
        $datos = $this->filtrarDatos();

        return view('livewire.crud.paises.ver-paises')
            ->with('datos', $datos);
    }

    #[On('pais-creado')] 
    public function creada() {}

    #[On('pais-editado')] 
    public function editada($id) {}

    #[On('pais-eliminado')] 
    public function eliminada() {}
}
