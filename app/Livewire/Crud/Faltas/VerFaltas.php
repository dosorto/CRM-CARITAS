<?php

namespace App\Livewire\Crud\Faltas;

use App\Models\Falta;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerFaltas extends Component
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
        'Falta Disciplinaria' => 'falta',
    ];


    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Falta Disciplinaria',
        'Gravedad',
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'falta',
        'gravedad.gravedad_falta'
    ];

    // Atributos de los botones (Componentes dinámicos) de cada fila (registro)
    public $actions = [
        [
            'name' => 'editFalta',
            'component' => 'crud.faltas.editar-falta-modal',
            'parameters' => ['idModal' => 'editFaltaModal']
        ],
        [
            'name' => 'deleteFalta',
            'component' => 'crud.faltas.eliminar-falta-modal',
            'parameters' => ['idModal' => 'deleteFaltaModal']
        ],
    ];
    public $paginationSize = 20; // Número de Registros por página
    public $itemClass = Falta::class; // Clase a mostrar en la tabla
    public $idCreateModal = 'createFaltaModal'; // id del modal de Crear
    // Debido a que solo es uno, se pasa por aparte

    public function render()
    {
        return view('livewire.crud.faltas.ver-faltas');
    }
}
