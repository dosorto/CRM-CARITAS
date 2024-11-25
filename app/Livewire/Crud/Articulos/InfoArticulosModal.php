<?php

namespace App\Livewire\Crud\Articulos;

use Livewire\Component;

class InfoArticulosModal extends Component
{
    public $item;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->initForm();
    }

    public function initForm(){}


    public function render()
    {
        return view('livewire.crud.articulos.info-articulos-modal');
    }
}