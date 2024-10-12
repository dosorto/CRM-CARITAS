<?php

namespace App\Livewire\Crud\Faltas;

use LivewireUI\Modal\ModalComponent;

class CrearFalta extends ModalComponent
{
    public function render()
    {
        return view('livewire.crud.faltas.crear-falta');
    }
}
