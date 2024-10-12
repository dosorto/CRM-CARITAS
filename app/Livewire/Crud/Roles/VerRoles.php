<?php

namespace App\Livewire\Crud\Roles;

use Livewire\Component;

use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class VerRoles extends Component
{
    use WithPagination;

    // Variable para filtrar datos
    public $texto_busqueda = '';

    public function filtrarDatos()
    {
        return Role::where('name', 'like', '%' . $this->texto_busqueda . '%')->paginate(5);
    }

    public function render()
    {
        $datos = $this->filtrarDatos();

        return view('livewire.crud.roles.ver-roles')
            ->with('datos', $datos);
    }

    #[On('rol-creado')] // Esta linea escucha el evento que envia el formulario de crear
    public function creado() {
        $this->filtrarDatos();
    }

    #[On('rol-editado')]
    public function editada($id) {}

    #[On('rol-eliminado')]
    public function eliminada() {}

}

