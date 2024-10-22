<?php

namespace App\Livewire\Crud\Paises;

use Livewire\Component;

class CrearPaisModal extends Component
{
    public $Nombre;
    public $Alfa3;
    public $Numerico;

    public function  crear()
    {
        $this->validate([
            'Nombre' => 'required',
            'Alfa3' => 'required',
            'Numerico' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.crud.paises.crear-pais-modal');
    }
}
