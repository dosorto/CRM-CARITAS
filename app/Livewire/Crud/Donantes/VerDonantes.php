<?php

namespace App\Livewire\Crud\Donantes;

use App\Models\Donante;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerDonantes extends Component
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
        'Nombre del Donante' => 'nombre_donante',
    ];

    public $colNames = [
        'Nombre del Donante',
        'Tipo de Donante',
    ];

    public $keys = [
        'nombre_donante',
        'tipoDonante.descripcion'
    ];

    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.donantes.editar-donantes-modal',
            'parameters' => ['idModal' => 'editDonanteModal']
        ],
        [
            'name' => 'delete',
            'component' => 'crud.donantes.eliminar-donantes-modal',
            'parameters' => ['idModal' => 'deleteDonanteModal']
        ]

    ];

    public $paginationSize = 15;
    public $itemClass = Donante::class;
    public $idCreateModal = 'createDonanteModal';

    public function render()
    {
        return view('livewire.crud.donantes.ver-donantes');
    }
}
