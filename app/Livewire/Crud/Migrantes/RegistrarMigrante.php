<?php

namespace App\Livewire\Crud\Migrantes;

use App\Livewire\Crud\Migrantes\Form\IdentificacionStep;
use App\Services\MigranteService;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;

#[Lazy()]
class RegistrarMigrante extends Component
{

    public $stepNames = [
        1 => 'Identificación',
        2 => 'Datos Personales',
        3 => 'Registro Familiar',
        4 => 'Situación Migratoria',
        5 => 'Necesidades y Observaciones',
    ];

    public $currentStep;

    public function mount()
    {
        if (!session()->has('currentStep')) {
            session(['currentStep' => 1]);
        }

        $this->currentStep = session('currentStep');
    }

    public function render()
    {
        return view('livewire.crud.migrantes.registrar-migrante');
    }


    public function cancelar()
    {
        session()->forget(['currentStep', 'formMigranteData']);
        $this->redirectRoute('ver-migrantes');
    }

    // Esta funcion se ejecuta al presionar el boton de "siguiente"
    public function validateStep()
    {
        // Dependiendo del paso, se validan los datos o se hacen acciones.
        switch ($this->currentStep) {
            case 1:
                $this->dispatch('validate-identificacion')->to(IdentificacionStep::class);
                break;

            case 2:
                break;

            case 3:
                break;

            case 4:
                break;

            case 5:
                break;
        }
    }

    public function nextStep()
    {
        if ($this->currentStep < 5)
        {
            $this->currentStep++;
            session(['currentStep' => $this->currentStep]);
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1)
        {
            $this->currentStep--;
            session(['currentStep' => $this->currentStep]);
        }
    }

    #[On('identificacion-validated')]
    public function identificacionValidated()
    {
        $identificacion = session('formMigranteData.migrante.identificacion');

        $migrante = $this->getMigranteService()->buscar('numero_identificacion', $identificacion);

        // Caso 1: el registro es totalmente nuevo
        if ($migrante === null) {
            $this->nextStep();
        }
        // Caso 2: El numero de identificacion ya existe
        else
        {
            // session(['formData.migranteFound' => true]);
            // $this->loadFieldsData();
            // $this->currentStep = 4;
        }
    }


    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }

















    // #[On('identificacion-validated')]
    // public function identificacionStep()
    // {
    //

    //     if ($migrante) {

    //         // verificar que no tenga un expediente activo
    //         if ($this->getMigranteService()->tieneExpedienteActivo($migrante->id))
    //         {

    //         }

    //         // Si ya existe el migrante, saltarse los pasos datos Personales.
    //         session(['nombreMigrante' => $migrante->primer_nombre . ' ' . $migrante->primer_apellido]);
    //         session(['identificacion' => $migrante->numero_identificacion]);
    //         session(['migranteId' => $migrante->id]);
    //         session(['currentStep' => 4]);
    //     } else {
    //         $this->nextStep();
    //     }
    // }

    // #[On('datos-personales-validated')]
    // public function datosPersonalesStep()
    // {
    //     $this->nextStep();
    // }

    // #[On('familiar-validated')]
    // public function familiarStep()
    // {

    //     if (session('migranteCreado')) {
    //         $this->nextStep();
    //     } else {
    //         // Obtener los datos actuales de la sesión
    //         $datos = $this->getMigranteService()->obtenerDatosNombresSeparados(session('datosPersonales'));

    //         try {

    //             $idMigrante = $this->getMigranteService()->guardarDatosPersonales($datos);

    //             if ($idMigrante) {


    //                 session(['nombreMigrante' => $datos['primerNombre'] . ' ' . $datos['primerApellido']]);
    //                 session(['identificacion' => $datos['identificacion']]);
    //                 session(['migranteId' => $idMigrante]);

    //                 session(['migranteCreado' => true]);

    //                 $this->nextStep();
    //             }
    //         } catch (Exception $e) {
    //             dump('ha ocurrido un error al guardar datos personales');
    //         }
    //     }
    // }


    // #[On('datos-migratorios-validated')]
    // public function datosMigratoriosStep()
    // {
    //     $this->nextStep();
    // }

    // #[On('situacion-validated')]
    // public function situacionStep()
    // {
    //     // guardar Expediente
    //     $newExpedienteId = $this->getMigranteService()->guardarExpediente(
    //         session('migranteId'),
    //         session('datosMigratorios.motivosSelected'),
    //         session('datosMigratorios.necesidadesSelected'),
    //         session('datosMigratorios.discapacidadesSelected'),
    //         session('datosMigratorios.fronteraId'),
    //         session('datosMigratorios.asesorId'),
    //         session('datosMigratorios.situacionId'),
    //         session('datosMigratorios.observacion'),
    //     );



    //     if ($newExpedienteId) {
    //         session()->forget(['datosPersonales', 'tieneFamiliar', 'viajaEnGrupo', 'migranteCreado']);
    //         session()->forget(['datosMigratorios', 'currentStep', 'totalSteps', 'nombreMigrante', 'identificacion', 'migranteId']);

    //         // dd($newExpedienteId);
    //         session(['expedienteId' => $newExpedienteId]);
    //         return redirect(route('ver-expediente'));
    //     }
    //     return redirect(route('ver-migrantes'));

    // }




    // #[On('previous-step')]
    // public function previousStep()
    // {
    //     $currentStep = session('currentStep', 0) - 1;
    //     session(['currentStep' => $currentStep]);
    // }

    // public function nextStep()
    // {
    //     $currentStep = session('currentStep', 0) + 1;
    //     session(['currentStep' => $currentStep]);
    // }

}
