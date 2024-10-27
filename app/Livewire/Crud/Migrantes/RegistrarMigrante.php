<?php

namespace App\Livewire\Crud\Migrantes;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;

#[Lazy()]
class RegistrarMigrante extends Component
{



    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

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
