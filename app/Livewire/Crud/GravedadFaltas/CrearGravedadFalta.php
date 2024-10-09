<?php

namespace App\Livewire\Crud\GravedadFaltas;

use App\Models\GravedadFalta;
use LivewireUI\Modal\ModalComponent;

class CrearGravedadFalta extends ModalComponent
{
    public $gravedad_falta;
    public $nivel_gravedad;

    public function crear()
    {
        $nueva_gravedad = new GravedadFalta;

        $nueva_gravedad->gravedad_falta = $this->gravedad_falta;
        $nueva_gravedad->nivel_gravedad = $this->nivel_gravedad;

        $nueva_gravedad->save();
        
        $this->dispatch('gravedad-creada');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.crud.gravedad-faltas.crear-gravedad-falta');
    }
}
