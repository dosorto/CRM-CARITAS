<?php

namespace App\Livewire\Components;

use Livewire\Component;

class NextStepButton extends Component
{
    public function nextStep()
    {
        $this->dispatch('next-step');
    }

    public function render()
    {
        return view('livewire.components.next-step-button');
    }
}
