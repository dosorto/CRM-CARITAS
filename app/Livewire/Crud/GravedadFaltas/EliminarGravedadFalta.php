<?php

namespace App\Livewire\Crud\GravedadFaltas;
use LivewireUI\Modal\ModalComponent;
use App\Models\GravedadFalta;

class EliminarGravedadFalta extends ModalComponent
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

    public function eliminar()
    {
        $gravedad = GravedadFalta::find($this->id);

        if ($gravedad) {
            $gravedad->delete();
        }

        $this->closeModal();
        $this->dispatch('gravedad-eliminada');

    }

    public function render()
    {
        return view('livewire.crud.gravedad-faltas.eliminar-gravedad-falta')
            ->with('gravedad_falta', $this->gravedad_falta);
    }
}
