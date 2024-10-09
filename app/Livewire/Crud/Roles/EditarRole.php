<?php

namespace App\Livewire\Crud\Roles;


use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class EditarRole extends ModalComponent
{
    public $id;
    public $name;

    public function mount($id)
    {
        $role = Role::find($id);
        $this->id = $id;
        $this->name = $role->name;
    }

    public function editar()
    {
        $nuevo_role = Role::find($this->id);

        $nuevo_role->name = $this->name;

        // C guarda
        $nuevo_role->save();

        $this->dispatch('rol-editado', id: $nuevo_role->id);

        $this->closeModal();

    }

    public function render()
    {
        return view('livewire.crud.roles.editar-role');
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

}
