<?php

namespace App\Livewire\Crud\GravedadFaltas;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

use App\Models\GravedadFalta;

class VerGravedadFaltas extends Component
{
    use WithPagination;

    // Variable para filtrar datos
    public $texto_busqueda = '';

    public function filtrarDatos()
    {
        return GravedadFalta::where('gravedad_falta', 'like', '%' . $this->texto_busqueda . '%')->paginate(5);
    }

    public function render()
    {
        $datos = $this->filtrarDatos();

        return view('livewire.crud.gravedad-faltas.ver-gravedad-faltas')
            ->with('datos', $datos);
    }

    #[On('gravedad-creada')] // Esta linea escucha el evento que envia el formulario de crear
    public function creada() {} // Por alguna razón, el simple hecho de existir esta función es suficiente para que la tabla se actualice.

    #[On('gravedad-editada')]
    public function editada($id) {}

    #[On('gravedad-eliminada')]
    public function eliminada() {}

}
