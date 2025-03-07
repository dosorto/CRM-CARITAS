<?php

namespace App\Livewire\Crud\Roles;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class MostrarPermisosRolModal extends Component
{
    public $item;
    public $rol;
    public $idModal;

    public function mount($parameters)
    {
        $this->idModal = $parameters['idModal'];

        // Cargar el item con sus permisos y rol para evitar problemas de null
        $this->item = Role::with('permissions')->find($parameters['item']->id);

        // Asegurar que el rol existe
        $this->rol = $this->item ?? null;
    }

    #[On('update-delete-modal')]
    public function udpateData($id)
    {
        // verifica si el id del item del modal es igual al id del item editado
        // para evitar que todos los modales de eliminar se actualicen con los datos del unico item editado.
        if ($this->item->id === $id)
        {
            $this->item = Role::find($id);
        }
    }

    public function render()
    {
        return view('livewire.crud.roles.mostrar-permisos-rol-modal', [
            'item' => $this->item,
            'rol' => $this->rol,
        ]);
    }
}
