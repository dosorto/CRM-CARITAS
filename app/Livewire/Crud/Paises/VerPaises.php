<?php

namespace App\Livewire\Crud\Paises;

use App\Models\Pais;
use Livewire\Component;

class VerPaises extends Component
{
    // Esto es para el buscador
    // $fakeColNames = [
    //     'Nombre que aparece en el select' => 'nombre del atributo'
    // ]
    public $fakeColNames = [
        'Nombre del Pais' => 'nombre_pais',
        'Codigo alfa-3' => 'codigo_alfa3',
        'Codigo Numérico' => 'codigo_numerico',
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

    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.paises.editar-pais-modal'
        ],
        [
            'name' => 'delete',
            'component' => 'crud.paises.eliminar-pais-modal'
        ]
    ];
    public $paginationSize = 30;
    public $itemClass = Pais::class;

    public function render()
    {
        return view('livewire.crud.paises.ver-paises');
    }
}
