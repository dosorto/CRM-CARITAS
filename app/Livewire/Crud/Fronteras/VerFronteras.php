<?php

namespace App\Livewire\Crud\Fronteras;

use App\Models\Frontera;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerFronteras extends Component
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
        'Frontera' => 'frontera',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Frontera',
        'Pais',
        'Departamento',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'frontera',
        'departamento.pais.nombre_pais',
        'departamento.nombre_departamento',
    ];

    // datos de botones, 'name' se usará para el identificador único del modal
    public $actions = [
        [
            'name' => 'editFrontera',
            'component' => 'crud.fronteras.editar-frontera-modal',
            'parameters' => ['idModal' => 'editFronteraModal']
        ],
        [
            'name' => 'deleteFrontera',
            'component' => 'crud.fronteras.eliminar-frontera-modal',
            'parameters' => ['idModal' => 'deleteFronteraModal']
        ]
    ];

    // Parametros adicionales para la content-table
    public $paginationSize = 30; // Número de registros por página
    public $itemClass = Frontera::class; // Clase que se mostrará
    public $idCreateModal = "createFronteraModal"; // id del modal de crear, debido a que solo hay una instancia, se pasa normalmente.

    public function render()
    {
        return view('livewire.crud.fronteras.ver-fronteras');
    }
}
