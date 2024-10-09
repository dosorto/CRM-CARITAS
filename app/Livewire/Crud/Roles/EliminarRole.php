<?php

namespace App\Livewire\Crud\Roles;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class EliminarRole extends ModalComponent
{
    public $id;
    public $name;

    public function mount($id)
    {
        $role = Role::find($id);

        $this->id = $id;
        $this->name = $role->name;
    }

    public function eliminar()
    {
        $role = Role::find($this->id);

        if ($role) {
            $role->delete();
        }

        $this->closeModal();
        $this->dispatch('rol-eliminado');

    }

    public function render()
    {
        return view('livewire.crud.roles.eliminar-role')
        ->with('name', $this->name);
    }

}
