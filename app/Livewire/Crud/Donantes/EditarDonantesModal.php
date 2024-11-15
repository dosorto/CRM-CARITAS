<?php

namespace App\Livewire\Crud\Donantes;

use App\Models\Donante;
use App\Models\TipoDonante;
use Livewire\Component;

class EditarDonantesModal extends Component
{
    public $item;
    public $nombre_donante;
    public $tipo_donante_id;
    public $tipos_donante;
    public $idModal;

    public function editItem()
    {
        $validated = $this->validate([
            'nombre_donante' => 'required|string|max:255',
            'tipo_donante_id' => 'required|exists:tipo_donante,id',
        ]);

        $donanteEdited = $this->item;
        $donanteEdited->nombre_donante = $validated['nombre_donante'];
        $donanteEdited->tipo_donante_id = $validated['tipo_donante_id'];

        $donanteEdited->save();

        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }

    public function initForm()
    {
        $this->nombre_donante = $this->item->nombre_donante;
        $this->tipo_donante_id = $this->item->tipo_donante_id;
        $this->tipos_donante = TipoDonante::all();
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.donantes.editar-donantes-modal');
    }
}
