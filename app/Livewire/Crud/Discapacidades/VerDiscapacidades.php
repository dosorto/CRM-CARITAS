<?php

namespace App\Livewire\Crud\Discapacidades;

use App\Models\Discapacidad;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerDiscapacidades extends Component
{
    // Anillo de Cargando cuando el componente tarda
    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    // Esto es para el buscador
    // $fakeColNames = [
    //     'Nombre que aparece en el select' => 'nombre del atributo'
    // ]
    public $fakeColNames = [
        'Discapacidad' => 'discapacidad',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Discapacidad',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'discapacidad',
    ];

    // datos de botones, 'name' se usará para el identificador único del modal
    public $actions = [
        [
            'name' => 'editDiscapacidad',
            'component' => 'crud.discapacidades.editar-discapacidad-modal',
            'parameters' => ['idModal' => 'editDiscapacidadModal']
        ],
        [
            'name' => 'deleteDiscapacidad',
            'component' => 'crud.discapacidades.eliminar-discapacidad-modal',
            'parameters' => ['idModal' => 'deleteDiscapacidadModal']
        ]
    ];

    // Parametros adicionales para la content-table
    public $paginationSize = 30; // Número de registros por página
    public $itemClass = Discapacidad::class; // Clase que se mostrará
    public $idCreateModal = "createDiscapacidadModal"; // id del modal de crear, debido a que solo hay una instancia, se pasa normalmente.

    public function render()
    {
        return view('livewire.crud.discapacidades.ver-discapacidades');
    }
}
