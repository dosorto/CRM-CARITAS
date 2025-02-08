<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use App\Models\AsesorMigratorio;
use App\Models\Frontera;
use App\Models\MotivoSalidaPais;
use App\Models\SituacionMigratoria;
use Livewire\Component;
use Livewire\Attributes\On;

class DatosMigratoriosStep extends Component
{

    public $fronteras = [];
    public $situaciones = [];
    public $asesoresMigratorios = [];

    public $fronteraId;
    public $situacionId;
    public $asesorId;

    public $motivosSalidaPais = [];
    public $motivosSelected = [];

    public function render()
    {
        return view('livewire.crud.migrantes.form.datos-migratorios-step');
    }

    public function mount()
    {
        // dd(session()->all());
        // obtiene los valores de la sesion, en caso de que exista, si no, asigna por defecto el segundo parametro de session()
        $this->asesorId = session('formMigranteData.expediente.asesorId', '');
        $this->fronteraId = session('formMigranteData.expediente.fronteraId', '');
        $this->situacionId = session('formMigranteData.expediente.situacionId', '');

        $this->fronteras = Frontera::orderBy('id', 'desc')->get();
        $this->situaciones = SituacionMigratoria::orderBy('id', 'desc')->get();
        $this->asesoresMigratorios = AsesorMigratorio::orderBy('id', 'desc')->get();
    }

    #[On('validate-datos-migratorios')]
    public function validateDatosMigratorios()
    {
        session()->forget('datosMigratorios');
        $validated = $this->validate([
            'fronteraId' => 'required',
            'situacionId' => 'required',
            'asesorId' => 'required',
        ]);

        session(['formMigranteData.expediente.fronteraId' => $validated['fronteraId']]);
        session(['formMigranteData.expediente.situacionId' => $validated['situacionId']]);
        session(['formMigranteData.expediente.asesorId' => $validated['asesorId']]);
        // session(['formMigranteData.expediente.motivosSelected' => $validated['motivosSelected']]);

        $this->dispatch('datos-migratorios-validated')
            ->to(RegistrarMigrante::class);
    }

    // public function updated($name, $value)
    // {
    //     switch ($name) {
    //         case 'asesorId':
    //             session()->put('formMigranteData.expediente.asesorId', $value);
    //             break;
    //         case 'fronteraId':
    //             session()->put('formMigranteData.expediente.fronteraId', $value);
    //             break;
    //         case 'situacionId':
    //             session()->put('formMigranteData.expediente.situacionId', $value);
    //             break;
    //         default:
    //             break;
    //     }
    // }

    // public function updatedMotivosSelected()
    // {
    //     session()->put('datosMigratorios.motivosSelected', $this->motivosSelected);
    // }


    #[On('asesor-created')]
    public function updateAsesorField()
    {

        // Se actualiza la lista de manera descendente para que el recien creado quede de primero.
        $this->asesoresMigratorios = AsesorMigratorio::orderBy('id', 'desc')->get();
        $this->asesorId =  $this->asesoresMigratorios[0]->id;
        // session()->put('formMigranteData.expediente.asesorId', $asesorId);
    }

    #[On('frontera-created')]
    public function updateFronteraField($newId)
    {
        $this->fronteras = Frontera::orderBy('id', 'desc')->get();
        $this->fronteraId = $this->fronteras[0]->id;
        // session()->put('formMigranteData.expediente.fronteraId', $fronteraId);
    }

    #[On('situacion-created')]
    public function updateSituacionField($newId)
    {
        $this->situaciones = SituacionMigratoria::orderBy('id', 'desc')->get();
        $this->situacionId = $this->situaciones[0]->id;
        // session()->put('formMigranteData.expediente.situacionId', $situacionId);
    }
}
