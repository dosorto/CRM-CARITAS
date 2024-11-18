<?php

namespace App\Livewire\Crud\SituacionesMigratorias;

use Livewire\Component;
use App\Models\SituacionMigratoria;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerSituacionesMigratorias extends Component
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
        'Situación Migratoria' => 'situacion_migratoria',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Situación Migratoria',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'situacion_migratoria',
    ];

    // datos de botones, 'name' se usará para el identificador único del modal
    public $actions = [
        [
            'name' => 'editSituacionMigratoria',
            'component' => 'crud.situaciones-migratorias.editar-situacion-migratoria-modal',
            'parameters' => ['idModal' => 'editSituacionMigratoriaModal']
        ],
        [
            'name' => 'deleteSituacionMigratoria',
            'component' => 'crud.situaciones-migratorias.eliminar-situacion-migratoria-modal',
            'parameters' => ['idModal' => 'deleteSituacionMigratoriaModal']
        ]
    ];

    // Parametros adicionales para la content-table
    public $paginationSize = 30; // Número de registros por página
    public $itemClass = SituacionMigratoria::class; // Clase que se mostrará
    public $idCreateModal = "createSituacionMigratoriaModal"; // id del modal de crear, debido a que solo hay una instancia, se pasa normalmente.


    public function render()
    {
        return view('livewire.crud.situaciones-migratorias.ver-situaciones-migratorias');
    }
}
