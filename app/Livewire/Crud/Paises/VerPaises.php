<?php

namespace App\Livewire\Crud\Paises;

use App\Models\Pais;
use Livewire\Component;
use Livewire\WithPagination;

class VerPaises extends Component
{
    use WithPagination;

    public $atributo = 'Nombre';
    public $texto_a_buscar = '';

    public $columnasFalsas = [
        'Nombre' => 'nombre_pais',
        'CodigoAlfa3' => 'codigo_alfa3',
        'CodigoNumerico' => 'codigo_numerico',
    ];

    public function filtrar()
    {
        $datos = Pais::where($this->columnasFalsas[$this->atributo], 'LIKE', '%' . $this->texto_a_buscar . '%')->paginate(30);
        $this->resetpage();
        return $datos;
    }

    public function limpiarFiltros()
    {
        $this->texto_a_buscar = '';
        $this->resetpage();
    }

    public function render()
    {
        $paises = $this->filtrar();
         return view('livewire.crud.paises.ver-paises')
            ->with('paises', $paises);
    }
}
