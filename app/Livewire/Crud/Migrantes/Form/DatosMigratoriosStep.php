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

    public $counter = 0;

    public $motivosSalidaPais = [];
    public $motivosSeleccionados = [];

    public function render()
    {
        return view('livewire.crud.migrantes.form.datos-migratorios-step');
    }

    public function mount()
    {
        // obtiene los valores de la sesion, en casi de que exista, si no, asigna por defecto el segundo parametro de session()
        $this->asesorId = session('datosMigratorios.asesorId', 1);
        $this->fronteraId = session('datosMigratorios.fronteraId', 1);
        $this->situacionId = session('datosMigratorios.situacionId', 1);
        $this->motivosSeleccionados = session('datosMigratorios.motivosSeleccionados', []);


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

            'motivosSeleccionados' => 'required|array|min:1',
            'motivosSeleccionados.*' => 'required',
        ]);

        // dd($validated['motivosSeleccionados']);

        session(['datosMigratorios' => $validated]);

        $this->dispatch('datos-migratorios-validated')
            ->to(RegistrarMigrante::class);
    }


    #[On('asesor-created')]
    public function updateAsesorField()
    {
        // Primero, actualizamos la lista de asesores
        $this->asesoresMigratorios = AsesorMigratorio::select('id', 'asesor_migratorio')
            ->orderBy('id', 'desc')
            ->get();
    }

    #[On('frontera-created')]
    public function updateFronteraField($newId)
    {
        // Luego obtenemos la lista ordenando por ID descendente para que el nuevo aparezca primero
        $this->fronteras = Frontera::select('id', 'frontera')
            ->orderBy('id', 'desc')
            ->get();
    }

    #[On('situacion-created')]
    public function updateSituacionField($newId)
    {
        // Luego obtenemos la lista ordenando por ID descendente para que el nuevo aparezca primero
        $this->situaciones = SituacionMigratoria::select('id', 'situacion_migratoria')
            ->orderBy('id', 'desc')
            ->get();
    }
}
