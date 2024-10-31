<?php

namespace App\Livewire\Components\Buttons;

use Livewire\Component;

class PreviousStepButton extends Component
{
    public function previousStep()
    {
        $this->dispatch('previous-step');
    }

    public function render()
    {
        return view('livewire.components.buttons.previous-step-button');
    }
}
