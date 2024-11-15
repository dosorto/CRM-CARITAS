<?php

namespace App\Livewire\Crud\TipoDonantes;

use App\Models\TipoDonante;
use Livewire\Component;

class EditarTipoDonantesModal extends Component
{
    public $descripcion;
    public $idModal;
    public $item;


    public function editItem()
    {

        $validated = $this->validate([
            'descripcion' => 'required|string|max:70|unique:tipo_donante,descripcion,' . $this->item->id,
        ]);


        $this->item->descripcion = $validated['descripcion'];
        $this->item->save();


        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }


    public function initForm()
    {
        $this->descripcion = $this->item->descripcion;
    }


    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->initForm();
    }
    public function render()
    {
        return view('livewire.crud.tipo-donantes.editar-tipo-donantes-modal');
    }
}
