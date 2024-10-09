<?php

namespace App\Livewire\Crud\Departamentos;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Departamento;

class VerDepartamentos extends Component
{
    use WithPagination;

    public $texto_busqueda = '';

    public function filtrarDatos()
    {
        return Departamento::with('pais')->where('nombre_departamento', 'like', '%' . $this->texto_busqueda . '%')->paginate(5);
    }

    public function render()
    {
        $datos = $this->filtrarDatos();
        return view('livewire.crud.departamentos.ver-departamentos')
            ->with('datos', $datos);
    }

    #[On('departamento-creado')] 
    public function creada() {}

    #[On('departamento-editado')] 
    public function editada($id) {}

    #[On('departamento-eliminado')] 
    public function eliminada() {}
}
