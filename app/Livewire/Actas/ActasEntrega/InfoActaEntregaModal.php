<?php

namespace App\Livewire\Actas\ActasEntrega;

use App\Models\ActaEntrega;
use Livewire\Component;

class InfoActaEntregaModal extends Component
{
    public $idModal;
    public $id;
    public $item;


    public function mount($idModal, $itemId)
    {
        $this->id = $itemId;
        $this->idModal = $idModal;
        $this->item = ActaEntrega::find($itemId);
    }

    public function render()
    {
        return view('livewire.actas.actas-entrega.info-acta-entrega-modal');
    }
}
