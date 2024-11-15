<?php

namespace App\Livewire\Crud\TipoDonantes;

use App\Models\TipoDonante;
use Livewire\Component;

class CrearTipoDonantesModal extends Component
{
    public $descripcion;  // Atributo para la descripción del tipo de donante
    public $idModal;


    public function create()
    {

        $validated = $this->validate([
            'descripcion' => 'required|string|max:70|unique:tipo_donante,descripcion',  // Validación única para la descripción
        ]);

        $nuevoTipoDonante = new TipoDonante();
        $nuevoTipoDonante->descripcion = $validated['descripcion'];


        $nuevoTipoDonante->save();

        $this->dispatch('cerrar-modal');
        $this->dispatch('item-created');
    }


    public function initForm()
    {
        $this->descripcion = '';
    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->initForm();
    }
    public function render()
    {
        return view('livewire.crud.tipo-donantes.crear-tipo-donantes-modal');
    }
}
