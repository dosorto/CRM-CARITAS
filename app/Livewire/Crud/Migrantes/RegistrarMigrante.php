<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
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

    public function mount()
    {
        // Si el paso no ha sido establecido, entonces se establece en 1
        if (!session()->has('currentStep')) {
            session([
                'currentStep' => 1,
                'totalSteps' => 5,
            ]);
        }

        $this->currentStep = session('currentStep');
    }

    public function render()
    {
        return view('livewire.crud.migrantes.registrar-migrante');
    }

    #[On('identificacion-validated')]
    public function identificacionStep()
    {
        $this->nextStep();
    }

    #[On('datos-personales-validated')]
    public function datosPersonalesStep()
    {
        $this->nextStep();
    }

    #[On('familiar-validated')]
    public function familiarStep()
    {
        if (session()->has('migranteCreated')) {
            $migrante = new Migrante();

            $nombres = $this->dividirNombre(session('datosPersonales')['nombres']);
            $apellidos = $this->dividirNombre(session('datosPersonales')['apellidos']);

            $migrante->primer_nombre = $nombres[0];
            $migrante->segundo_nombre = $nombres[1];
            $migrante->primer_apellido = $apellidos[0];
            $migrante->segundo_apellido = $apellidos[1];
            $migrante->sexo = session('datosPersonales')['sexo'];
            $migrante->tipo_identificacion = session('datosPersonales')['tipoIdentificacion'];
            $migrante->numero_identificacion = session('identificacion');
            $migrante->pais_id = session('datosPersonales')['idPais'];
            $migrante->codigo_familiar = session('codigoFamiliar');
            $migrante->fecha_nacimiento = session('datosPersonales')['fechaNacimiento'];
            $migrante->es_lgbt = session('datosPersonales')['esLGBT'];
            $migrante->estado_civil = session('datosPersonales')['estadoCivil'];

            $migrante->save();

            session(['migranteCreated' => true]);
            session()->flash('message', 'Datos personales del migrante ingresados con éxito');
            session()->flash('type', 'success');
        }

        $this->nextStep();
    }

    #[On('previous-step')]
    public function previousStep()
    {
        $currentStep = session('currentStep', 0) - 1;
        session(['currentStep' => $currentStep]);
    }

    public function nextStep()
    {
        $currentStep = session('currentStep', 0) + 1;
        session(['currentStep' => $currentStep]);
    }

    function dividirNombre($cadena)
    {
        $partes = explode(' ', $cadena, 2); // Divide en 2 partes, donde el primer elemento es el primero
        $primero = $partes[0]; // Primer palabra es el primer nombre o apellido
        $segundo = isset($partes[1]) ? $partes[1] : ''; // Resto del string es el segundo nombre o apellido (o vacío si no hay)

        return [$primero, $segundo];
    }
}
