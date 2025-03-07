<?php

namespace App\Livewire\Crud\Roles;

use App\Livewire\Components\ContentTable;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRoleModal extends Component
{
    public $idModal;
    public $Nombre;
    public $permissions = [];
    public $selectedPermissions = [];
    public $search = '';
    public $textoBusquedaPermisos = '';

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->Nombre = '';
        $this->permissions = Permission::pluck('name', 'id')->toArray();
        //$this->permissions = Permission::orderBy('id', 'desc')->get();
    }

    public function updatedTextoBusquedaPermisos($value)
{
    $query = Permission::orderBy('id', 'desc');

    if (trim($value) !== '') {
        $query->where('name', 'LIKE', '%' . trim($value) . '%');
    }

    $this->permissions = $query->pluck('name', 'id')->toArray();

}



    public function create()
    {
        // Valida los datos de los inputs ingresados
        $validated = $this->validate([
            // 'wire:model de input' => 'validacion necesaria'
            'Nombre' => 'required',
            'selectedPermissions' => 'required|array|min:1'
        ]);

        // Logica para crear el pais, se usan los datos validados con $validated
        $role = Role::create([
            'name' => $validated['Nombre']
        ]);

        $role->syncPermissions(Permission::whereIn('id', $this->selectedPermissions)->pluck('name')->toArray());


        $this->reset(['Nombre', 'selectedPermissions']);

        // Se envía el evento de item-created a la tabla para que actualice su contenido.
        $this->dispatch('item-created')->to(ContentTable::class);

        // este evento se envia en este mismo componente y se escucha en la vista con un script,
        // que cambia el valor del checkbox del modal a 'false', cerrándolo.
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->dispatch('close-modal')->self();
        $this->Nombre = '';
        $this->reset(['Nombre', 'selectedPermissions']);
    }

    public function render()
    {
        return view('livewire.crud.roles.create-role-modal',  [
            'permissions' => $this->permissions
        ]);
    }
}
