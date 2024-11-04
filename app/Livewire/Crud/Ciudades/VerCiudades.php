<?php

namespace App\Livewire\Crud\Ciudades;

use App\Models\Ciudad;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerCiudades extends Component
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
        'Nombre de la Ciudad' => 'nombre_ciudad',
    ];

    // Nombre de los encabezados de las columnas
    public $colNames = [
        'Nombre de la Ciudad', 
        'Departamento'];

    // Atributos, deben estar en el mismo orden que las $colNames
    public $keys = [
        'nombre_ciudad', 
        'departamento.nombre_departamento',];

    public $actions = [
        [
            'name' => 'editCiudad',
            'component' => 'crud.ciudades.editar-ciudad-modal',
            'parameters' => ['idModal' => 'editCiudadModal']
        ],
        [
            'name' => 'deleteCiudad',
            'component' => 'crud.ciudades.eliminar-ciudad-modal',
            'parameters' => ['idModal' => 'deleteCiudadModal']
        ],
    ];
    public $paginationSize = 50;
    public $itemClass = Ciudad::class;
    public $idCreateModal = 'crearCiudadModal';

    public function render()
    {
        return view('livewire.crud.ciudades.ver-ciudades');
    }
}
