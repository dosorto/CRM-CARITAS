<?php

namespace App\Livewire\Components\Forms;

use Livewire\Component;

class Steps extends Component
{
    public $currentStep;
    public $stepsLeft;
    
    public function mount()
    {
        $this->currentStep = session('currentStep');
        $this->stepsLeft = session('totalSteps') - $this->currentStep;
    }

    public function render()
    {
        return view('livewire.components.forms.steps');
    }
}
