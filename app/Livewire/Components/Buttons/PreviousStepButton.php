<?php

namespace App\Livewire\Components\Buttons;

use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use Livewire\Component;

class PreviousStepButton extends Component
{
    public function previousStep()
    {
        $this->dispatch('previous-step')->to(RegistrarMigrante::class);
    }

    public function render()
    {
        return view('livewire.components.buttons.previous-step-button');
    }
}
