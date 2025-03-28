<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Donacion;
use Livewire\Component;
use Livewire\Attributes\Lazy;

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
        'Fecha de Donación' => 'fecha_donacion',
        'Identificador del Donante' => 'id_donante',

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
            'name' => 'info',
            'component' => 'crud.donaciones.info-donaciones',
            'parameters' => ['idModal' => 'infoDonaciones']
        ],
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

    ];


    public $paginationSize = 9;
    public $itemClass = Donacion::class;

    public function render()
    {
        return view('livewire.crud.donaciones.ver-donaciones');
    }

    public function crearDonacion()
    {
        return $this->redirectRoute('crear-donacion');
    }
}
