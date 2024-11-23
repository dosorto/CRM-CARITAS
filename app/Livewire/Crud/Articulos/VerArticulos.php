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
        'Código de barra',
        'Cantidad Disponible',
        'Categoria del Articulo'
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'nombre',
        'codigo_barra',
        'cantidad_stock',
        'categoriaArticulo.name_categoria'
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
        [
            'name' => 'info',
            'component' => 'crud.articulos.info-articulos-modal',
            'parameters' => ['idModal' => 'infoArticulosModal']
        ]
    ];

    public $paginationSize = 15;
    public $itemClass = Articulo::class;
    public $idCreateModal = 'createArticuloModal';


    public function render()
    {
        return view('livewire.crud.articulos.ver-articulos');
    }
}
