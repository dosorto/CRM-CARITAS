<?php

namespace App\Livewire\Crud\Mobiliarios;
use Livewire\WithPagination;
use App\Models\Mobiliario;
use Livewire\Attributes\On;

use Livewire\Component;

class VerMobiliarios extends Component
{
    use WithPagination;

    public $texto_busqueda = '';

    public function filtrarDatos()
    {
        return Mobiliario::with('subcategoria')->where('nombre_mobiliario', 'like', '%' . $this->texto_busqueda . '%')->paginate(5);
    }


    public function render()
    {
        $datos = $this->filtrarDatos();
        return view('livewire.crud.mobiliarios.ver-mobiliarios')
            ->with('datos', $datos);
    }

    #[On('mobiliario-creado')] 
    public function creada() {}

}


