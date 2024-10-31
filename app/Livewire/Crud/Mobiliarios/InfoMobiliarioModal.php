<?php

namespace App\Livewire\Crud\Mobiliarios;

use Livewire\Component;

class InfoMobiliarioModal extends Component
{

    public $item;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function resetForm(){}


    public function render()
    {
        return view('livewire.crud.mobiliarios.info-mobiliario-modal');
    }
}
