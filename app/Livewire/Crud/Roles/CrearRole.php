<?php

namespace App\Livewire\Crud\Roles;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CrearRole extends ModalComponent
{
    public $name;
    public $permisos_asignados = [];

    public function crear()
    {
        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->permisos_asignados);

        $this->closeModal();

        $this->dispatch('rol-creado');
    }


    public function render()
    {
        return view('livewire.crud.roles.crear-role')
            ->with('permisos', Permission::all()->pluck('name'));
    }
}
