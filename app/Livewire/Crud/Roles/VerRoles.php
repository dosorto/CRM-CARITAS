<?php

namespace App\Livewire\Crud\Roles;

use Livewire\Attributes\Lazy;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Lazy()]
class VerRoles extends Component
{
        // Esto es para el buscador
    // $fakeColNames = [
    //     'Nombre que aparece en el select' => 'nombre del atributo'
    // ]
    public $fakeColNames = [
        'Rol' => 'name',
    ];


    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Rol',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'name',
    ];

    // Atributos de los botones (Componentes dinámicos) de cada fila (registro)
    public $actions = [
        [
            'name' => 'editRole',
            'component' => 'crud.roles.edit-role-modal',
            'parameters' => ['idModal' => 'editRoleModal']
        ],
        [
            'name' => 'deleteRole',
            'component' => 'crud.roles.eliminar-role-modal',
            'parameters' => ['idModal' => 'deleteRoleModal']
        ],
    ];
    public $paginationSize = 10; // Número de Registros por página
    public $itemClass = Role::class; // Clase a mostrar en la tabla
    public $idCreateModal = 'createRoleModal'; // id del modal de Crear
    // Debido a que solo es uno, se pasa por aparte

    public function render()
    {
        return view('livewire.crud.roles.ver-roles');
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }
}
