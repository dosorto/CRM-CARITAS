<?php

namespace App\Livewire\Crud\Paises;

use App\Models\Pais;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerPaises extends Component
{
    // Anillo de Cargando cuando el componente tarda
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
        'Nombre del País' => 'nombre_pais',
        'Código alfa-3' => 'codigo_alfa3',
        'Código Numérico' => 'codigo_numerico',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Nombre del País',
        'Código alfa-3',
        'Código Numérico'
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'nombre_pais',
        'codigo_alfa3',
        'codigo_numerico'
    ];

    // datos de botones, 'name' se usará para el identificador único del modal
    public $actions = [
        [
            'name' => 'editPais',
            'component' => 'crud.paises.editar-pais-modal',
            'parameters' => ['idModal' => 'editPaisModal']
        ],
        [
            'name' => 'deletePais',
            'component' => 'crud.paises.eliminar-pais-modal',
            'parameters' => ['idModal' => 'deletePaisModal']
        ]
    ];

    // Parametros adicionales para la content-table
    public $paginationSize = 30; // Número de registros por página
    public $itemClass = Pais::class; // Clase que se mostrará
    public $idCreateModal = "createPaisModal"; // id del modal de crear, debido a que solo hay una instancia, se pasa normalmente.

    public function render()
    {
        return view('livewire.crud.paises.ver-paises');
    }
}
