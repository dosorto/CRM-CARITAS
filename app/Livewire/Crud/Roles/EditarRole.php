<?php

namespace App\Livewire\Crud\Roles;


use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditarRole extends ModalComponent
{
    public $id;
    public $name;
    public $selectedPermissions = [];

    public function mount($id)
    {
        $role = Role::find($id);
        $this->id = $id;
        $this->name = $role->name;

        // Obtener los permisos actuales asignados al rol
        $this->selectedPermissions = $role->permissions()->pluck('id')->toArray();
    }

    public function editar()
    {
        $nuevo_role = Role::find($this->id);

        $nuevo_role->name = $this->name;


        // Convertir los IDs de permisos seleccionados a nombres de permisos
        $permissionsNames = Permission::whereIn('id', $this->selectedPermissions)->pluck('name')->toArray();

        // Actualizar los permisos seleccionados usando los nombres
        $nuevo_role->syncPermissions($permissionsNames);

        // C guarda
        $nuevo_role->save();

        $this->dispatch('rol-editado', id: $nuevo_role->id);


        $this->closeModal();

    }

    public function render()
    {
        $permissions = Permission::all();

        return view('livewire.crud.roles.editar-role', compact('permissions'));
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

}
