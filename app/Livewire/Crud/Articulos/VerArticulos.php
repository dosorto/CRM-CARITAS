<?php

namespace App\Livewire\Crud\Articulos;

use App\Models\Articulo;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy()]
class VerArticulos extends Component
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
        'Nombre del Articulo' => 'nombre',
        'Código de Barra' => 'codigo_barra',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Nombre del Articulo',
        'Descripción',
        'Código de barra',
        'Cantidad Disponible'
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'nombre',
        'descripcion',
        'codigo_barra',
        'cantidad_stock',
    ];

    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.articulos.editar-articulo-modal',
            'parameters' => ['idModal' => 'editArticuloModal']
        ],
        [
            'name' => 'delete',
            'component' => 'crud.articulos.eliminar-articulo-modal',
            'parameters' => ['idModal' => 'deleteArticuloModal']
        ],
    ];

    public $paginationSize = 15;
    public $itemClass = Articulo::class;
    public $idCreateModal = 'createArticuloModal';


    public function render()
    {
        return view('livewire.crud.articulos.ver-articulos');
    }
}
