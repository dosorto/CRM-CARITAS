<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ConfirmationModal extends Component
{
    public $label;
    public $title;
    public $description;
    public $btnSize;
    public $icon;
    public $iconSize;
    public $btnColor;
    public $borderColor;
    public $idModal;


    public function mount(
        $label = 'Abrir Modal',
        $title = '¿Está seguro de que desea realizar esta acción?',
        $description = '',
        $btnSize = 'md',
        $icon = '',
        $iconSize = '5',
        $btnColor = 'accent',
        $borderColor = '',
        $idModal = '',
    ) {
        $this->label = $label;
        $this->title = $title;
        $this->description = $description;
        $this->btnSize = $btnSize;
        $this->icon = $icon;
        $this->iconSize = $iconSize;
        $this->btnColor = $btnColor;
        $this->borderColor = $borderColor;
        $this->idModal = $idModal;
    }

    public function render()
    {
        return view('livewire.components.confirmation-modal');
    }
}
