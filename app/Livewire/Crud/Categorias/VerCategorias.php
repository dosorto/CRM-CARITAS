<?php

namespace App\Livewire\Crud\Categorias;

use App\Models\Categoria;
use App\Models\Pais;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerCategorias extends Component
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
        'Nombre de la Categoria' => 'nombre_categoria',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Nombre de la Categoría',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'nombre_categoria',
    ];

    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.categorias.editar-categoria-modal',
            'parameters' => ['idModal' => 'editCategoriaModal']
        ],
        [
            'name' => 'delete',
            'component' => 'crud.categorias.eliminar-categoria-modal',
            'parameters' => ['idModal' => 'deleteCategoriaModal']
        ]
    ];
    public $paginationSize = 10;
    public $itemClass = Categoria::class;
    public $idCreateModal = "createCategoriaModal";

    public function render()
    {
        return view('livewire.crud.categorias.ver-categorias');
    }
}
