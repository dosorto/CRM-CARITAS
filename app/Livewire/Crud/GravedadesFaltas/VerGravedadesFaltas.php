<?php

namespace App\Livewire\Crud\GravedadesFaltas;

use App\Models\GravedadFalta;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerGravedadesFaltas extends Component
{
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
        'Gravedad' => 'gravedad_falta',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Gravedad',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'gravedad_falta',
    ];

    // datos de botones, 'name' se usará para el identificador único del modal
    public $actions = [
        [
            'name' => 'editGravedad',
            'component' => 'crud.gravedades-faltas.editar-gravedad-modal',
            'parameters' => ['idModal' => 'editGravedadModal']
        ],
        [
            'name' => 'deleteGravedad',
            'component' => 'crud.gravedades-faltas.eliminar-gravedad-modal',
            'parameters' => ['idModal' => 'deleteGravedadModal']
        ]
    ];

    // Parametros adicionales para la content-table
    public $paginationSize = 15; // Número de registros por página
    public $itemClass = GravedadFalta::class; // Clase que se mostrará
    public $idCreateModal = "createGravedadFaltaModal"; // id del modal de crear, debido a que solo hay una instancia, se pasa normalmente.

    public function render()
    {
        return view('livewire.crud.gravedades-faltas.ver-gravedades-faltas');
    }
}
