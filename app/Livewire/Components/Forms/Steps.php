<?php

namespace App\Livewire\Components\Forms;

use Livewire\Component;

class Steps extends Component
{
    public $currentStep;
    public $stepsLeft;
    
    public function mount($currentStep, $steps)
    {
        $this->currentStep = $currentStep;
        $this->stepsLeft = $steps - $currentStep;
    }

    public function render()
    {
        return view('livewire.components.forms.steps');
    }
}
