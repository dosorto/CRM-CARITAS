<?php

namespace App\Livewire\Crud\Migrantes;

use Livewire\Component;
use Livewire\Attributes\On;

class RegistrarMigrante extends Component
{
    public $currentStep = 1;
    public $identificacion;

    public function render()
    {
        return view('livewire.crud.migrantes.registrar-migrante');
    }

    #[On('identificacion-validated')]
    public function identificacionStep($validatedData)
    {
        $this->identificacion = $validatedData['identificacion'];


        $this->currentStep++;
    }

    #[On('previous-step')]
    public function previousStep()
    {
        $this->currentStep--;
    }
}
