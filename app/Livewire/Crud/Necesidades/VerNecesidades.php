<?php

namespace App\Livewire\Crud\Necesidades;

use App\Models\Necesidad;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerNecesidades extends Component
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
        'Necesidad' => 'necesidad',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Necesidad',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'necesidad',
    ];

    // datos de botones, 'name' se usará para el identificador único del modal
    public $actions = [
        [
            'name' => 'editNecesidad',
            'component' => 'crud.necesidades.editar-necesidad-modal',
            'parameters' => ['idModal' => 'editNecesidadModal']
        ],
        [
            'name' => 'deleteNecesidad',
            'component' => 'crud.necesidades.eliminar-necesidad-modal',
            'parameters' => ['idModal' => 'deleteNecesidadModal']
        ]
    ];

    // Parametros adicionales para la content-table
    public $paginationSize = 15; // Número de registros por página
    public $itemClass = Necesidad::class; // Clase que se mostrará
    public $idCreateModal = "createNecesidadModal"; // id del modal de crear, debido a que solo hay una instancia, se pasa normalmente.

    public function render()
    {
        return view('livewire.crud.necesidades.ver-necesidades');
    }
}
