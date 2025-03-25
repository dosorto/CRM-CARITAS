<?php

namespace App\Livewire\Crud\TipoDonantes;

use App\Models\TipoDonante;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerTipoDonantes extends Component
{
    public $fakeColNames = [
        'Tipo de Donante' => 'descripcion',
    ];

    public $colNames = [
        'Descripción',
    ];

    public $keys = [
        'descripcion',
    ];

    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.tipo-donantes.editar-tipo-donantes-modal',
            'parameters' => ['idModal' => 'editTipoDonanteModal'],
        ],
        [
            'name' => 'delete',
            'component' => 'crud.tipo-donantes.eliminar-tipo-donantes-modal',
            'parameters' => ['idModal' => 'deleteTipoDonanteModal'],
        ],
    ];

    public $paginationSize = 10;
    public $itemClass = TipoDonante::class;
    public $idCreateModal = "createTipoDonantesModal";


    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public function render()
    {
        $tiposDonantes = TipoDonante::paginate($this->paginationSize);

        return view('livewire.crud.tipo-donantes.ver-tipo-donantes', compact('tiposDonantes'));
    }

}
