<?php

namespace App\Livewire\Crud\Roles;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class CrearRole extends ModalComponent
{
    public $name;

    public function crear()
    {
        $role = Role::create(['name' => $this->name]);

        $this->closeModal();

        $this->dispatch('rol-creado');
    }


    public function render()
    {
        return view('livewire.crud.roles.crear-role');
    }
}
