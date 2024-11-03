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

    public $currentStep;
    public $identificacion;
    public $datosPersonales;
    public $codigoFamiliar;

    public function mount()
    {
        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.crud.migrantes.registrar-migrante');
    }

    #[On('identificacion-validated')]
    public function identificacionStep($identificacion)
    {
        $this->identificacion = $identificacion;
        $this->currentStep++;
    }

    #[On('datos-personales-validated')]
    public function datosPersonalesStep($datosPersonales)
    {
        $this->datosPersonales = $datosPersonales;
        // $nombres = $validatedData['nombres'];
        // $apellidos = $validatedData['apellidos'];
        // $sexo = $validatedData['sexo'];
        // $tipoIdentificacion = $validatedData['tipoIdentificacion'];
        // $idPais = $validatedData['idPais'];
        // $estadoCivil = $validatedData['estadoCivil'];
        // $esLGBT = $validatedData['esLGBT'];
        // $fechaNacimiento = $validatedData['fechaNacimiento'];



        $this->currentStep++;
    }

    #[On('familiar-validated')]
    public function familiarStep($codigoFamiliar)
    {
        $this->codigoFamiliar = $codigoFamiliar;        
        $this->currentStep++;
    }

    #[On('previous-step')]
    public function previousStep()
    {
        $this->currentStep--;
    }
}
