<?php

namespace App\Livewire\Crud\Migrantes;

use App\Services\MigranteService;
use Livewire\Component;
use Livewire\Attributes\Lazy;

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

    public $currentStep = 1;

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }


    public function mount() {}

    public function render()
    {

        return view('livewire.crud.migrantes.registrar-migrante');
    }


    public function cancelar()
    {
        session()->forget(['currentStep', 'formData']);
        $this->redirectRoute('ver-migrantes');
    }


    public function getMigranteService()
    {
        return app(MigranteService::class);
    }

    public function getIsStepActive($step)
    {
        return $this->currentStep === $step ? 'checked' : '';
    }

    public function nextStep()
    {
        if ($this->currentStep < 5) {  // Usa la propiedad directamente
            $this->currentStep++;  // Incrementa la propiedad
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {  // Usa la propiedad directamente
            $this->currentStep--;  // Decrementa la propiedad
        }
    }
























    // #[On('identificacion-validated')]
    // public function identificacionStep()
    // {
    //     $migrante = $this->getMigranteService()->buscar('numero_identificacion', session('datosPersonales')['identificacion']);

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
