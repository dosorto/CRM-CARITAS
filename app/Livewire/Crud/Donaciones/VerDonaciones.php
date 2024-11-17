<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Donacion;
use App\Models\Articulo;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy()]
class VerDonaciones extends Component
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
        'Identificador del Donante' => 'id_donante',
        'Fecha de Donación' => 'fecha_donacion',
        
    ];

    public $colNames = [
        'Nombre del Donante', 
        'Fecha de Donación',
    ];

    public $keys = [
       'donante.nombre_donante',
        'fecha_donacion',
    ];

    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.donaciones.editar-donaciones-modal',
            'parameters' => ['idModal' => 'editDonacionModal'],
        ],
        [
            'name' => 'delete',
            'component' => 'crud.donaciones.eliminar-donaciones-modal',
            'parameters' => ['idModal' => 'deleteDonacionModal'],
        ],
        [
            'name' => 'info',
            'component' => 'crud.donaciones.info-donaciones',
            'parameters' => ['idModal' => 'infoDonaciones']
        ]

    ];

    
    public $paginationSize = 9;
    public $itemClass = Donacion::class;
    public $idCreateModal = 'createDonacionModal';

    
    
    public function render()
    {
        return view('livewire.crud.donaciones.ver-donaciones');
    }
}
