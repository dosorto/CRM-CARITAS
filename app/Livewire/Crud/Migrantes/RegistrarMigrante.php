<?php

namespace App\Livewire\Crud\Migrantes;

use App\Services\MigranteService;
use Exception;
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


    public function mount()
    {

        // Si el paso no ha sido establecido, entonces se establece en 1
        if (!session()->has('currentStep')) {
            session([
                'currentStep' => 1,
                'totalSteps' => 5,
            ]);
        }
    }

    public function render()
    {

        return view('livewire.crud.migrantes.registrar-migrante');
    }



    #[On('identificacion-validated')]
    public function identificacionStep()
    {
        $migrante = $this->getMigranteService()->buscar('numero_identificacion', session('datosPersonales')['identificacion']);

        if ($migrante) {

            // Si ya existe el migrante, saltarse los pasos datos Personales.
            // session()->forget(['datosPersonales']);
            session(['nombreMigrante' => $migrante->primer_nombre . ' ' . $migrante->primer_apellido]);
            session(['identificacion' => $migrante->numero_identificacion]);
            session(['migranteId' => $migrante->id]);
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

    #[On('familiar-validated')]
    public function familiarStep()
    {

        if (session('migranteCreado')) {
            $this->nextStep();
        } else {
            // Obtener los datos actuales de la sesión
            $datos = $this->getMigranteService()->obtenerDatosNombresSeparados(session('datosPersonales'));

            try {

                $idMigrante = $this->getMigranteService()->guardarDatosPersonales($datos);

                if ($idMigrante) {


                    session(['nombreMigrante' => $datos['primerNombre'] . ' ' . $datos['primerApellido']]);
                    session(['identificacion' => $datos['identificacion']]);
                    session(['migranteId' => $idMigrante]);

                    session(['migranteCreado' => true]);

                    $this->nextStep();
                }
            } catch (Exception $e) {
                dump('ha ocurrido un error al guardar datos personales');
            }
        }
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

        $this->redirect(route('ver-expediente'));
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
