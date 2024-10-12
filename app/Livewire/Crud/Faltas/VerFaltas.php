<?php

namespace App\Livewire\Crud\Faltas;

use Livewire\Component;
use App\Models\FaltaDisciplinaria;


class VerFaltas extends Component
{
    public $texto_busqueda;

    public function filtrarDatos()
    {
        // dump(FaltaDisciplinaria::with('gravedadFalta')->get());
        // dd(1);
        return FaltaDisciplinaria::with('gravedadFalta')->where('falta_disciplinaria', 'like', '%' . $this->texto_busqueda . '%')->paginate(5);   
    }

    public function render()
    {
        $datos = $this->filtrarDatos();

        return view('livewire.crud.faltas.ver-faltas')
            ->with('datos', $datos);
    }
}
