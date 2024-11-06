<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Illuminate\Support\Facades\Auth;

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


    public function mount()
    {
        // Asi se obtiene el usuario
        // dd(Auth::user());

        // Si el paso no ha sido establecido, entonces se establece en 1
        if (!session()->has('currentStep')) {
            session([
                'currentStep' => 1,
                'totalSteps' => 5,
            ]);
        }
        session(['titulo' => 'Registrar Migrante']);
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
            session()->flash('type', 'alert-success');  // O alert-success, alert-warning, alert-error para DaisyUI
            session()->flash('alertIcon', 'akar-icons--info');
            session(['currentStep' => 4]);

            session(['titulo' => 'Registrar Nuevo Expediente: ']);
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
        $this->nextStep();
    }

    #[On('familiar-validated')]
    public function familiarStep()
    {
        if (!session()->has('migranteCreated')) {
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
            session()->flash('alertIcon', 'si--check-circle-fill');
            session()->flash('message', '¡Datos personales del migrante ingresados!');
            session()->flash('type', 'alert-success');
        }
        session(['titulo' => 'Registrar Nuevo Expediente: ']);
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
