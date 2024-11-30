<?php

namespace App\Livewire\Crud\Departamentos;

use App\Models\Departamento;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerDepartamentos extends Component
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
        'Nombre del Departamento' => 'nombre_departamento',
        'Código' => 'codigo_departamento',
    ];


    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Nombre del Departamento',
        'Código',
        'Nombre del Pais'
    ];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'nombre_departamento',
        'codigo_departamento',
        'pais.nombre_pais'
    ];

    // Atributos de los botones (Componentes dinámicos) de cada fila (registro)
    public $actions = [
        [
            'name' => 'editDepartamento',
            'component' => 'crud.departamentos.editar-departamento-modal',
            'parameters' => ['idModal' => 'editDepartamentoModal']
        ],
        [
            'name' => 'deleteDepartamento',
            'component' => 'crud.departamentos.eliminar-departamento-modal',
            'parameters' => ['idModal' => 'deleteDepartamentoModal']
        ],
    ];
    public $paginationSize = 15; // Número de Registros por página
    public $itemClass = Departamento::class; // Clase a mostrar en la tabla
    public $idCreateModal = 'createDepartamentoModal'; // id del modal de Crear
    // Debido a que solo es uno, se pasa por aparte

    public function render()
    {
        return view('livewire.crud.departamentos.ver-departamentos');
    }
}
