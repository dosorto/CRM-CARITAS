<?php

namespace App\Livewire\Crud\MotivoSalida;
use App\Models\MotivoSalidaPais;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerMotivos extends Component
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
    public $fakeColNames = [
        'Motivo' => 'motivo_salida_pais',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Motivo de Salida del Pais',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'motivo_salida_pais',
    ];

    // datos de botones, 'name' se usará para el identificador único del modal
    public $actions = [
        [
            'name' => 'editMotivo',
            'component' => 'crud.motivo-salida.editar-motivo-modal',
            'parameters' => ['idModal' => 'editMotivoModal']
        ],
        [
            'name' => 'deleteMotivo',
            'component' => 'crud.motivo-salida.eliminar-motivo-modal',
            'parameters' => ['idModal' => 'deleteMotivoModal']
        ]
    ];

    // Parametros adicionales para la content-table
    public $paginationSize = 15; // Número de registros por página
    public $itemClass = MotivoSalidaPais::class; // Clase que se mostrará
    public $idCreateModal = "createMotivoModal"; // id del modal de crear, debido a que solo hay una instancia, se pasa normalmente.

    public function render()
    {
        return view('livewire.crud.motivo-salida.ver-motivos');
    }
}
