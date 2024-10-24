<?php

namespace App\Livewire\Crud\Departamentos;

use App\Models\Departamento;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class VerDepartamentos extends Component
{
    use WithPagination, WithoutUrlPagination;

    // Esto es para el buscador
    public $fakeColNames = [
        'Nombre del Departamento' => 'nombre_departamento',
        'Código' => 'codigo_departamento',
    ];

    public function render()
    {
        $colNames = ['Nombre del Departamento', 'Código', 'Nombre del Pais'];
        $keys = ['nombre_departamento', 'codigo_departamento', 'pais.nombre_pais'];

        return view('livewire.crud.departamentos.ver-departamentos')
            ->with('colNames', $colNames)
            ->with('keys', $keys)
            ->with('itemClass', Departamento::class);;
    }
}
