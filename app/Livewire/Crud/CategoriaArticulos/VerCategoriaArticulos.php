<?php

namespace App\Livewire\Crud\CategoriaArticulos;

use App\Models\CategoriaArticulo;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy()]
class VerCategoriaArticulos extends Component
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
        'Nombre de la Categoria' => 'name_categoria',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Nombre de la Categoría',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'name_categoria',
    ];

    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.categoria-articulos.editar-categoria-articulos-modal',
            'parameters' => ['idModal' => 'editCategoriaModal']
        ],
        [
            'name' => 'delete',
            'component' => 'crud.categoria-articulos.eliminar-categoria-articulos-modal',
            'parameters' => ['idModal' => 'deleteCategoriaModal']
        ]
    ];
    public $paginationSize = 10;
    public $itemClass = CategoriaArticulo::class;
    public $idCreateModal = "createCategoriaArticulosModal";

    public function render()
    {
        return view('livewire.crud.categoria-articulos.ver-categoria-articulos');
    }
}
