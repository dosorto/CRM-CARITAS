<?php

namespace App\Livewire\Crud\Paises;

use App\Models\Pais;
use Livewire\Component;

class CrearPaisModal extends Component
{
    public $Nombre;
    public $Alfa3;
    public $Numerico;

    public function  create()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'Alfa3' => 'required|size:3',
            'Numerico' => 'required|size:3',
        ]);

        $nuevoPais = new Pais;
        $nuevoPais->nombre_pais = $validated['Nombre'];
        $nuevoPais->codigo_alfa3 = $validated['Alfa3'];
        $nuevoPais->codigo_numerico = $validated['Numerico'];

        $nuevoPais->save();
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-created');
    }

    public function render()
    {
        return view('livewire.crud.paises.crear-pais-modal');
    }
}
