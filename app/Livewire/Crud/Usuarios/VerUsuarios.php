<?php

namespace App\Livewire\Crud\Usuarios;

use App\Models\User;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy()]
class VerUsuarios extends Component
{
    public $fakeColNames = [
        'Nombre' => 'nombre',
        'Apellido' => 'apellido',
        'Identidad' => 'identidad',
        'Correo' => 'email',
    ];

    public $colNames = [
        'Nombre',
        'Apellido',
        'Identidad',
        'Correo',
    ];

    public $keys = [
        'nombre',
        'apellido',
        'identidad',
        'email',
    ];

    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.usuarios.editar-usuario-modal',
            'parameters' => ['idModal' => 'editUsuarioModal'],
        ],
        [
            'name' => 'delete',
            'component' => 'crud.usuarios.eliminar-usuario-modal',
            'parameters' => ['idModal' => 'deleteUsuarioModal'],
        ],
    ];

    public $paginationSize = 10;
    public $itemClass = User::class;
    public $idCreateModal = "createUserModal";
    public $tableSize = "sm";
    public $textSize = "sm";

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public function render()
    {
        return view('livewire.crud.usuarios.ver-usuarios');
    }
}
