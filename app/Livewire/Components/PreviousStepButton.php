<?php

namespace App\Livewire\Components;

use Livewire\Component;

class PreviousStepButton extends Component
{

    public function previousStep()
    {
        $this->dispatch('previous-step');
    }

    public function render()
    {
        return view('livewire.components.previous-step-button');
    }
}
