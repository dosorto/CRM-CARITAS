<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use App\Models\AsesorMigratorio;
use App\Models\Frontera;
use App\Models\MotivoSalidaPais;
use App\Models\SituacionMigratoria;
use Livewire\Component;
use Illuminate\Validation\Rule;
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
    public array $motivosSelected = [];

    public function render()
    {
        return view('livewire.crud.migrantes.form.datos-migratorios-step');
    }

    public function mount()
    {
        // obtiene los valores de la sesion, en caso de que exista, si no, asigna por defecto el segundo parametro de session()
        $this->asesorId = session('datosMigratorios.asesorId', 1);
        $this->fronteraId = session('datosMigratorios.fronteraId', 1);
        $this->situacionId = session('datosMigratorios.situacionId', 1);


        $this->motivosSelected = session('datosMigratorios.motivosSelected', []);


        $this->fronteras = Frontera::select('id', 'frontera')->get();
        $this->situaciones = SituacionMigratoria::select('id', 'situacion_migratoria')->get();
        $this->asesoresMigratorios = AsesorMigratorio::select('id', 'asesor_migratorio')->get();
        $this->motivosSalidaPais = MotivoSalidaPais::select('id', 'motivo_salida_pais')->get();
    }

    public function nextStep()
    {
        $validated = $this->validate([
            'fronteraId' => 'required',
            'situacionId' => 'required',
            'asesorId' => 'required',

            'motivosSelected' => 'required|array|min:1',
            'motivosSelected.*' => 'required',
        ]);
        
        session(['datosMigratorios.fronteraId' => $validated['fronteraId']]);
        session(['datosMigratorios.situacionId' => $validated['situacionId']]);
        session(['datosMigratorios.asesorId' => $validated['asesorId']]);
        session(['datosMigratorios.motivosSelected' => $validated['motivosSelected']]);

        $this->dispatch('datos-migratorios-validated')
            ->to(RegistrarMigrante::class);
    }

    public function updated($name, $value)
    {
        switch ($name) {
            case 'asesorId':
                session()->put('datosMigratorios.asesorId', $value);
                break;
            case 'fronteraId':
                session()->put('datosMigratorios.fronteraId', $value);
                break;
            case 'situacionId':
                session()->put('datosMigratorios.situacionId', $value);
                break;
            default:
                break;
        }
    }
    public function updatedMotivosSelected()
    {
        session()->put('datosMigratorios.motivosSelected', $this->motivosSelected);
    }


    #[On('asesor-created')]
    public function updateAsesorField()
    {
        // Se actualiza la lista de manera descendente para que el recien creado quede de primero.
        $this->asesoresMigratorios = AsesorMigratorio::select('id', 'asesor_migratorio')
            ->orderBy('id', 'desc')
            ->get();

        $asesorId = $this->asesoresMigratorios[0]->id;
        $this->asesorId =  $asesorId;
        session()->put('datosMigratorios.asesorId', $asesorId);
    }

    #[On('frontera-created')]
    public function updateFronteraField($newId)
    {
        $this->fronteras = Frontera::select('id', 'frontera')
            ->orderBy('id', 'desc')
            ->get();
        $fronteraId = $this->fronteras[0]->id;
        $this->fronteraId = $fronteraId;
        session()->put('datosMigratorios.fronteraId', $fronteraId);
    }

    #[On('situacion-created')]
    public function updateSituacionField($newId)
    {
        $this->situaciones = SituacionMigratoria::select('id', 'situacion_migratoria')
            ->orderBy('id', 'desc')
            ->get();
        $this->situacionId =
        $situacionId =  $this->situaciones[0]->id;
        $this->situacionId = $situacionId;
        session()->put('datosMigratorios.situacionId', $situacionId);
    }
}
