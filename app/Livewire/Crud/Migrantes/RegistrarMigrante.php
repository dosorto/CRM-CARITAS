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
        // session(['currentStep' => 1]);
        return view('livewire.crud.migrantes.registrar-migrante');
    }

    #[On('identificacion-validated')]
    public function identificacionStep()
    {
        $migrante = Migrante::select('id', 'primer_nombre', 'primer_apellido')
            ->where('numero_identificacion', session('identificacion'))
            ->first();

        if ($migrante) {
            session(['idMigrante' => $migrante->id]);
            session()->flash('message', '¡Nueva visita por parte de: ' . $migrante->primer_nombre . ' ' . $migrante->primer_apellido . '!');
            session()->flash('type', 'alert-info');
            session()->flash('alertIcon', 'akar-icons--info');
            session(['currentStep' => 4]);
        } else {
            $this->nextStep();
        }
    }

    #[On('datos-personales-validated')]
    public function datosPersonalesStep()
    {
        $this->nextStep();
    }
    #[On('datos-migratorios-validated')]
    public function datosMigratoriosStep()
    {
        $this->nextStep();
    }
    #[On('situacion-validated')]
    public function situacionStep()
    {
        // guardar Expediente
        $newExpedienteId = $this->getMigranteService()->guardarExpediente(
            session('migranteId'),
            session('datosMigratorios.motivosSelected'),
            session('datosMigratorios.necesidadesSelected'),
            session('datosMigratorios.discapacidadesSelected'),
            session('datosMigratorios.fronteraId'),
            session('datosMigratorios.asesorId'),
            session('datosMigratorios.situacionId'),
            session('datosMigratorios.observacion'),
        );


        if ($newExpedienteId) {
            session()->forget(['datosPersonales', 'tieneFamiliar', 'viajaEnGrupo', 'migranteCreado']);
            session()->forget(['datosMigratorios', 'currentStep', 'totalSteps', 'nombreMigrante', 'identificacion', 'migranteId']);

            // dd($newExpedienteId);
            session(['expedienteId' => $newExpedienteId]);
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
