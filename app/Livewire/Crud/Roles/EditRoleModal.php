<?php

namespace App\Livewire\Crud\Roles;

use App\Livewire\Components\ContentTable;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditRoleModal extends Component
{
    public $item;
    public $Nombre;
    public $idModal;
    public $permissions = []; // Todos los permisos disponibles
    public $selectedPermissions = []; // Permisos asignados al rol

    public $search = '';
    public $textoBusquedaPermisos = '';

    public function mount($parameters)
    {
        $this->item = Role::with('permissions')->find($parameters['item']->id);
        $this->idModal = $parameters['idModal'];
        $this->Nombre = $this->item->name;

        // Obtener todos los permisos
        $this->permissions = Permission::pluck('name', 'id')->toArray();

        // Cargar permisos del rol
        $this->selectedPermissions = $this->item->permissions()->pluck('id')->toArray();
    }

    public function updateRole()
    {
        // Validar datos
        $validated = $this->validate([
            'Nombre' => 'required|string|max:255',
            'selectedPermissions' => 'array', // Asegurar que es un array
        ]);

        // Actualizar nombre del rol
        $this->item->name = $validated['Nombre'];
        $this->item->save();

        // Sincronizar permisos
        $permissions = Permission::whereIn('id', $this->selectedPermissions)->get();
        $this->item->syncPermissions($permissions);

        $this->dispatch('item-edited')->to(ContentTable::class);
        // Cerrar modal
        $this->dispatch('close-modal')->self();
        //$this->dispatch('role-updated');

        // Se envía un evento con el id del departamento a EliminarDepartamentoModal,
        // para actualizar la información instantáneamente cuando se edite el item en específico.
        $this->dispatch('update-delete-modal', id: $this->item->id)->to(MostrarPermisosRolModal::class);
        $this->dispatch('update-delete-modal', id: $this->item->id)->to(EliminarRoleModal::class);

        // De igual manera, se envía el evento de item-edited a la tabla para que actualice su contenido.
        $this->dispatch('item-edited')->to(ContentTable::class);
    }

    public function closeModal()
    {
        $this->Nombre = $this->item->name;
        $this->selectedPermissions = $this->item->permissions()->pluck('id')->toArray();
        $this->dispatch('close-modal')->self();
    }

    public function updatedTextoBusquedaPermisos($value)
    {
        $query = Permission::orderBy('id', 'desc');

        if (trim($value) !== '') {
            $query->where('name', 'LIKE', '%' . trim($value) . '%');
        }

        $this->permissions = $query->pluck('name', 'id')->toArray();
    }


    public function render()
    {
        return view('livewire.crud.roles.edit-role-modal', [
            'permissions' => $this->permissions
        ]);
    }
}
