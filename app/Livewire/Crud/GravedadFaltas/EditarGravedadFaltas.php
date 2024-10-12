<?php

namespace App\Livewire\Crud\GravedadFaltas;

use App\Models\GravedadFalta;
use LivewireUI\Modal\ModalComponent;

class EditarGravedadFaltas extends ModalComponent
{
    public $id;
    public $gravedad_falta;
    public $nivel_gravedad;

    public function mount($id)
    {
        $gravedad = GravedadFalta::find($id);
        $this->id = $id;
        $this->gravedad_falta = $gravedad->gravedad_falta;
        $this->nivel_gravedad = $gravedad->nivel_gravedad;
    }

    public function editar()
    {
        $nueva_gravedad = GravedadFalta::find($this->id);

        $nueva_gravedad->gravedad_falta = $this->gravedad_falta;
        $nueva_gravedad->nivel_gravedad = $this->nivel_gravedad;

        // C guarda
        $nueva_gravedad->save();

        $this->dispatch('gravedad-editada', id: $nueva_gravedad->id);

        $this->closeModal();

    }

    public function render()
    {
        return view('livewire.crud.gravedad-faltas.editar-gravedad-faltas');
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;   
    }

    
}
