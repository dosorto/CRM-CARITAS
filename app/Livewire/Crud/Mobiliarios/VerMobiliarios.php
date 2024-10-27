<?php

namespace App\Livewire\Crud\Mobiliarios;

use App\Models\Mobiliario;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerMobiliarios extends Component
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
        'Nombre del Mobiliario' => 'nombre_mobiliario',
        'Código' => 'codigo',

    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Código',
        'Nombre del Mobiliario',
        'Estado',
        'Ubicación',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'codigo',
        'nombre_mobiliario',
        'estado',
        'ubicacion',
    ];

    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.mobiliarios.editar-mobiliario-modal',
            'parameters' => ['idModal' => 'editMobiliarioModal']
        ],
        [
            'name' => 'delete',
            'component' => 'crud.mobiliarios.eliminar-mobiliario-modal',
            'parameters' => ['idModal' => 'deleteMobiliarioModal']
        ],
        [
            'name' => 'info',
            'component' => 'crud.mobiliarios.info-mobiliario-modal',
            'parameters' => ['idModal' => 'infoMobiliarioModal']
        ]
    ];
    public $paginationSize = 6;
    public $itemClass = Mobiliario::class;
    public $idCreateModal = "createMobiliarioModal";

    public function render()
    {
        return view('livewire.crud.mobiliarios.ver-mobiliarios');
    }
}
