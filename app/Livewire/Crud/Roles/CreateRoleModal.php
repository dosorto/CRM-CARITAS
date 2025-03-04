<?php

namespace App\Livewire\Crud\Roles;

use App\Livewire\Components\ContentTable;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRoleModal extends Component
{
    public $idModal;
    public $Nombre;

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->Nombre = '';
    }



    public function create()
    {
        // Valida los datos de los inputs ingresados
        $validated = $this->validate([
            // 'wire:model de input' => 'validacion necesaria'
            'Nombre' => 'required'
        ]);

        // Logica para crear el pais, se usan los datos validados con $validated
        Role::create([
            'name' => $validated['Nombre']
        ]);

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
    }

    public function render()
    {
        return view('livewire.crud.roles.create-role-modal');
    }
}
