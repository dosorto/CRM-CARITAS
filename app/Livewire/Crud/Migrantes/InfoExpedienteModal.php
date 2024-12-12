<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Expediente;
use Livewire\Component;

class InfoExpedienteModal extends Component
{
    public $idModal;
    public $id;
    public $item;


    public function mount($idModal, $itemId)
    {
        $this->id = $itemId;
        $this->idModal = $idModal;
        $this->item = Expediente::find($itemId);
    }

    public function render()
    {
        return view('livewire.crud.migrantes.info-expediente-modal');
    }

    public function imprimir($id)
    {
        $this->redirectRoute('ver-expediente', ['expedienteId' => $id]);
    }
}
