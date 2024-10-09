<?php

namespace App\Livewire\Crud\Ciudades;

use App\Models\Ciudad;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\Attributes\On;

class VerCiudades extends Component
{

    use WithoutUrlPagination;

    public $texto_busqueda = '';

    public function filtrarDatos()
    {
        return Ciudad::where('nombre_ciudad', 'like', '%' . $this->texto_busqueda . '%')->paginate(5);
    }

    public function render()
    {
        $ciudades = $this->filtrarDatos();

        return view('livewire.crud.ciudades.ver-ciudades')
            ->with('datos', $ciudades);
    }


    #[on('ciudad-creada')]
    public function creada(){}

    #[on('ciudad-editada')]
    public function editada(){}

    #[on('ciudad-eliminada')]
    public function eliminada(){}

}
