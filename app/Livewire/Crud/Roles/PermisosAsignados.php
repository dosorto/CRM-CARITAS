<?php

namespace App\Livewire\Crud\Roles;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class PermisosAsignados extends ModalComponent
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $role = Role::find($this->id);

        $permisos = $role->permissions->pluck('name');

        return view('livewire.crud.roles.permisos-asignados')
        ->with('permisos', $permisos);
    }
}
