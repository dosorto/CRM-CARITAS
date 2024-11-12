<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
use App\Services\MigranteService;
use Exception;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Locked;

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
        // Si el paso no ha sido establecido, entonces se establece en 1
        if (!session()->has('currentStep')) {
            session([
                'currentStep' => 1,
                'totalSteps' => 5,
            ]);
        }

        // Verifica si ya tiene titulo, si no, asigna el inicial.
        if (!session()->has('tituloRegistrarMigrante')) {
            session(['tituloRegistrarMigrante' => 'Registrar Migrante']);
        }
    }

    public function render()
    {

        return view('livewire.crud.migrantes.registrar-migrante');
    }



    #[On('identificacion-validated')]
    public function identificacionStep()
    {

        $migrante = Migrante::select('id', 'primer_nombre', 'primer_apellido')
            ->where('numero_identificacion', session('identificacion'))
            ->first();

        if ($migrante) {

            // Si ya existe el migrante, ingresar nuevo expediente.

            session(['idMigrante' => $migrante->id]);
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
        $this->nextStep();
    }

    #[On('familiar-validated')]
    public function familiarStep()
    {
        // Obtener los datos actuales de la sesión
        $datosActuales = session('datosPersonales');

        // Separar nombres y apellidos
        $nombres = $this->getMigranteService()->separarNombres($datosActuales['nombres']);
        $apellidos = $this->getMigranteService()->separarNombres($datosActuales['apellidos']);

        // Eliminar los campos originales y añadir los nuevos
        unset($datosActuales['nombres']);
        unset($datosActuales['apellidos']);

        $datosActuales = array_merge($datosActuales, [
            'primerNombre' => $nombres[0],
            'segundoNombre' => $nombres[1],
            'primerApellido' => $apellidos[0],
            'segundoApellido' => $apellidos[1]
        ]);

        try {
            if ($this->getMigranteService()->guardarDatosPersonales($datosActuales)) {
                session()->flush();
                session(['nombreMigrante' => $datosActuales['primerNombre'] . ' ' . $datosActuales['primerApellido']]);
                session(['identificacion' => $datosActuales['identificacion']]);

                $this->nextStep();
            }
        } catch (Exception $e) {
            dump('ha ocurrido un error al guardar datos personales');
        }
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

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }
}
