<?php

namespace App\Livewire\Crud\Migrantes;

use App\Livewire\Crud\Migrantes\Form\DatosMigratoriosStep;
use App\Livewire\Crud\Migrantes\Form\DatosPersonalesStep;
use App\Livewire\Crud\Migrantes\Form\FamiliarStep;
use App\Livewire\Crud\Migrantes\Form\IdentificacionStep;
use App\Livewire\Crud\Migrantes\Form\MotivosStep;
use App\Services\MigranteService;
use Illuminate\Validation\ValidationException;
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
        4 => 'Datos Migratorios',
        5 => 'Motivos y Necesidades',
        6 => 'Discapacidades y Observaciones',
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
                $this->dispatch('validate-datos-personales')->to(DatosPersonalesStep::class);
                break;

            case 3:
                $this->dispatch('validate-familiar')->to(FamiliarStep::class);
                break;

            case 4:
                $this->dispatch('validate-datos-migratorios')->to(DatosMigratoriosStep::class);
                break;

            case 5:
                $this->dispatch('validate-motivos')->to(MotivosStep::class);
                break;
            case 6:
                $this->nextStep();
                break;
        }
    }

    public function nextStep()
    {
        if ($this->currentStep < 6) {
            $this->currentStep++;
            session(['currentStep' => $this->currentStep]);
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
            session(['currentStep' => $this->currentStep]);
        }
    }

    #[On('identificacion-validated')]
    public function identificacionValidated()
    {
        if ($this->currentStep === 1) {
            $identificacion = session()->get('formMigranteData.migrante.identificacion', '');

            $migrante = $this->getMigranteService()->buscar('numero_identificacion', $identificacion);

            // Caso 1: el registro es totalmente nuevo
            if ($migrante === null) {
                $this->nextStep();
            }
            // Caso 2: El numero de identificacion ya existe
            else {

                // Verificar que el migrante no tenga expedientes activos
                if ($this->getMigranteService()->tieneExpedienteActivo($migrante->id)){
                    $this->dispatch('expediente-aun-activo')->self();
                    session()->forget(['formMigranteData']);
                }


                // session(['formData.migranteFound' => true]);
                // $this->loadDataFound();
                // $this->currentStep = 4;
            }

            // Caso 3: El formulario se abrió desde el listado de migrantes.
        }
    }

    public function loadDataFound() {}

    #[On('datos-personales-validated')]
    public function datosPersonalesValidated()
    {
        if ($this->currentStep === 2) {
            $this->nextStep();
        }
    }

    #[On('familiar-validated')]
    public function familiarValidated()
    {
        if ($this->currentStep === 3) {
            $this->nextStep();
        }
    }

    #[On('datos-migratorios-validated')]
    public function datosMigratoriosValidated()
    {
        if ($this->currentStep === 4) {
            $this->nextStep();
        }
    }

    #[On('motivos-validated')]
    public function motivosValidated()
    {
        if ($this->currentStep === 5) {
            $this->nextStep();
        }
    }

    public function guardarRegistro()
    {
        $nombres = $this->getMigranteService()->separarNombres(session('formMigranteData.migrante.nombres'));
        $apellidos = $this->getMigranteService()->separarNombres(session('formMigranteData.migrante.apellidos'));

        $migranteId = $this->getMigranteService()->guardarDatosPersonales(
            $nombres[0],
            $nombres[1],
            $apellidos[0],
            $apellidos[1],
            session('formMigranteData.migrante.identificacion'),
            session('formMigranteData.migrante.tipoIdentificacion'),
            session('formMigranteData.migrante.sexo'),
            session('formMigranteData.migrante.idPais'),
            session('formMigranteData.migrante.codigoFamiliar'),
            session('formMigranteData.migrante.fechaNacimiento'),
            session('formMigranteData.migrante.estadoCivil'),
            session('formMigranteData.migrante.tipoSangre'),
            session('formMigranteData.migrante.esLGBT')
        );

        $expedienteId = $this->getMigranteService()->guardarExpediente(
            $migranteId,
            session('formMigranteData.expediente.motivosSalidaPais'),
            session('formMigranteData.expediente.necesidades'),
            session('formMigranteData.expediente.discapacidades'),
            session('formMigranteData.expediente.fronteraId'),
            session('formMigranteData.expediente.asesorId'),
            session('formMigranteData.expediente.situacionId'),
            session('formMigranteData.expediente.fechaIngreso'),
            session('formMigranteData.expediente.observacion'),
        );

        if ($expedienteId) {
            session()->forget(['currentStep', 'formMigranteData']);
            // session(['formMigranteData.expedienteId' => $expedienteId]);
            return $this->redirectRoute('ver-expediente', ['expedienteId' => $expedienteId]);
        }

        return $this->cancelar();
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
}
