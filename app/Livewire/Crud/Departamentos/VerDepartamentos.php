<?php

namespace App\Livewire\Crud\Departamentos;

use App\Models\Departamento;
use Livewire\Attributes\Lazy;
use Livewire\Component;

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
        'Nombre del Pais'];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'nombre_departamento', 
        'codigo_departamento', 
        'pais.nombre_pais'];

    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.departamentos.editar-departamento-modal',
            'params' => []
        ],
        [
            'name' => 'delete',
            'component' => 'crud.departamentos.eliminar-departamento-modal',
            'params' => []
        ],
    ];
    public $paginationSize = 15;
    public $itemClass = Departamento::class;

    public function render()
    {
        return view('livewire.crud.departamentos.ver-departamentos');
    }
}
