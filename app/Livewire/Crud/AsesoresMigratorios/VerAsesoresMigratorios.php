<?php

namespace App\Livewire\Crud\AsesoresMigratorios;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use App\Models\AsesorMigratorio;

#[Lazy()]
class VerAsesoresMigratorios extends Component
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
        'Asesor Migratorio' => 'asesor_migratorio',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Asesor Migratorio',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'asesor_migratorio',
    ];

    // datos de botones, 'name' se usará para el identificador único del modal
    public $actions = [
        [
            'name' => 'editAsesorMigratorio',
            'component' => 'crud.asesores-migratorios.editar-asesor-migratorio-modal',
            'parameters' => ['idModal' => 'editAsesorMigratorioModal']
        ],
        // [
        //     'name' => 'deleteAsesorMigratorio',
        //     'component' => 'crud.asesores-migratorios.eliminar-asesor-migratorio-modal',
        //     'parameters' => ['idModal' => 'deleteAsesorMigratorioModal']
        // ]
    ];

    // Parametros adicionales para la content-table
    public $paginationSize = 30; // Número de registros por página
    public $itemClass = AsesorMigratorio::class; // Clase que se mostrará
    public $idCreateModal = "createAsesorMigratorioModal"; // id del modal de crear, debido a que solo hay una instancia, se pasa normalmente.


    public function render()
    {
        return view('livewire.crud.asesores-migratorios.ver-asesores-migratorios');
    }
}
