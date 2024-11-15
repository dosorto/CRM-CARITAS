<?php

namespace App\Livewire\Crud\Donantes;

use App\Models\Donante;
use App\Models\TipoDonante;
use Livewire\Component;

class CrearDonantesModal extends Component
{
    public $nombre_donante;
    public $tipo_donante_id;
    public $tiposDonantes;
    public $idModal;

    public function create()
    {
        $validated = $this->validate([
            'nombre_donante' => 'required|string|max:255',
            'tipo_donante_id' => 'required|exists:tipo_donante,id',
        ]);

        $nuevoDonante = new Donante();
        $nuevoDonante->nombre_donante = $validated['nombre_donante'];
        $nuevoDonante->tipo_donante_id = $validated['tipo_donante_id'];
        $nuevoDonante->save();

        $this->dispatch('cerrar-modal');
        $this->dispatch('item-created');
    }

    public function initForm()
    {
        $this->tiposDonantes = TipoDonante::all();
        $this->nombre_donante = '';

    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.donantes.crear-donantes-modal');
    }
}


