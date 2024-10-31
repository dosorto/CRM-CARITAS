<?php

namespace App\Livewire\Crud\SubCategorias;
use App\Models\SubCategoria;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerSubCategorias extends Component
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
        'Nombre de la Subcategoría' => 'nombre_subcategoria',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Nombre de la Subcategoria', 
        'Categoría'];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'nombre_subcategoria', 
        'categoria.nombre_categoria',];

    public $actions = [
        [
            'name' => 'editSubcategoria',
            'component' => 'crud.sub-categorias.editar-sub-categoria-modal',
            'parameters' => ['idModal' => 'editSubCategoriaModal']
        ],
        [
            'name' => 'deleteSubcategoria',
            'component' => 'crud.sub-categorias.eliminar-sub-categoria-modal',
            'parameters' => ['idModal' => 'deleteSubCategoriaModal']
        ],
    ];
    public $paginationSize = 6;
    public $itemClass = SubCategoria::class;
    public $idCreateModal = 'crearSubCategoriaModal';

    public function render()
    {
        return view('livewire.crud.sub-categorias.ver-sub-categorias');
    }
}
