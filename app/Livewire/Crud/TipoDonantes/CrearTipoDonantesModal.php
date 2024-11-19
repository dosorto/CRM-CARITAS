<?php

namespace App\Livewire\Crud\TipoDonantes;

use App\Livewire\Components\ContentTable;
use App\Livewire\Crud\Donantes\CrearDonantesModal;
use App\Models\TipoDonante;
use Livewire\Component;

class CrearTipoDonantesModal extends Component
{
    public $descripcion;
    public $idModal;


    public function create()
    {

        $validated = $this->validate([
            'descripcion' => 'required|string|max:70|unique:tipo_donante,descripcion',  // Validación única para la descripción
        ]);

        $nuevoTipoDonante = new TipoDonante();
        $nuevoTipoDonante->descripcion = $validated['descripcion'];


        $nuevoTipoDonante->save();
        //se despacha el evento a si mismo para cerrarsolo este modal
        $this->dispatch('cerrar-modal')->self();

        //Este evento se envia a la tabla de contenido para actualizarse
        $this->dispatch('item-created')->to(ContentTable::class);

        //Este evento se envia al modal de Crear Donante Modal para actualizar el select
        $this->dispatch('tipo-donante-created')->to(CrearDonantesModal::class);
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
