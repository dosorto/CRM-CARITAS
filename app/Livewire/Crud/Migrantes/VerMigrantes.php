<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerMigrantes extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public $fakeColNames = [
        'Número de Identificación' => 'numero_identificacion',
        'Nombres' => 'nombre_departamento',
        'Apellidos' => 'codigo_departamento',
        'Código Familiar' => 'codigo_familiar',
    ];


    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Identificación',
        'Nombre Completo',
        'Pais',
        'Código Familiar'
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'numero_identificacion',
        'codigo_departamento',
        'pais.nombre_pais'
    ];

    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.migrantes.editar-migrante',
            'parameters' => []
            // 'parameters' => ['idModal' => 'editMigranteModal']
        ],
        [
            'name' => 'delete',
            'component' => 'crud.migrantes.eliminar-migrante-modal',
            'parameters' => ['idModal' => 'deleteMigranteModal']
        ],
        [
            'name' => 'info',
            'component' => 'crud.migrantes.info-migrante-modal',
            'parameters' => ['idModal' => 'deleteMigranteModal']
        ],
    ];
    public $paginationSize = 20;
    public $itemClass = Migrante::class;
    public $idCreateModal = 'createMigranteModal';

    public function render()
    {
        return view('livewire.crud.migrantes.ver-migrantes');
    }
}
