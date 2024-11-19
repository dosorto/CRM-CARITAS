<?php

namespace App\Livewire\Crud\Migrantes\Form;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use App\Models\AsesorMigratorio;
use App\Models\Discapacidad;
use App\Models\Frontera;
use App\Models\Necesidad;
use App\Models\SituacionMigratoria;

class SituacionStep extends Component
{
    public $necesidadesSelected = [];
    public $necesidades = [];

    // public $situacionesSelected = [];
    // public $situaciones = [];

    public $discapacidadesSelected = [];
    public $discapacidades = [];

    public $observacion = '';



    // Variables para la inicializacion de los datos del modal de confirmacion
    public $asesor = '';
    public $situacion = '';
    public $frontera = '';

    public function mount()
    {
        $this->necesidades = Necesidad::select('id', 'necesidad')->get();
        // $this->situaciones = SituacionMigratoria::select('id', 'situacion_migratoria')->get();
        $this->discapacidades = Discapacidad::select('id', 'discapacidad')->get();

        $this->necesidadesSelected = session('datosMigratorios.necesidadesSelected', []);
        // $this->situacionesSelected = session('datosMigratorios.situacionesSelected', []);
        $this->discapacidadesSelected = session('datosMigratorios.discapacidadesSelected', []);
        $this->observacion = session('datosMigratorios.observacion', '');


        // Inicializa los datos extra para la confirmación de creación del expediente
        $this->asesor = AsesorMigratorio::select('asesor_migratorio')
            ->where('id', session('datosMigratorios.asesorId'))
            ->first()
            ->asesor_migratorio;

        $this->situacion = SituacionMigratoria::select('situacion_migratoria')
            ->where('id', session('datosMigratorios.situacionId'))
            ->first()
            ->situacion_migratoria;

        $this->frontera = Frontera::select('frontera')
            ->where('id', session('datosMigratorios.fronteraId'))
            ->first()
            ->frontera;
    }

    public function test()
    {
        dump(1);
    }

    public function render()
    {
        return view('livewire.crud.migrantes.form.situacion-step');
    }

    public function saveExpediente()
    {
        $this->validate([
            'necesidadesSelected' => 'required|array|min:1',
            'necesidadesSelected.*' => 'required',

            // 'situacionesSelected' => 'required|array|min:1',
            // 'situacionesSelected.*' => 'required',

            // 'discapacidadesSelected' => 'required|array|min:1',
            // 'discapacidadesSelected.*' => 'required',
        ]);

        $this->dispatch('situacion-validated')
            ->to(RegistrarMigrante::class);
    }


    public function updated()
    {
        session()->put('datosMigratorios.necesidadesSelected', $this->necesidadesSelected);
        // session()->put('datosMigratorios.situacionesSelected', $this->situacionesSelected);
        session()->put('datosMigratorios.discapacidadesSelected', $this->discapacidadesSelected);
        session()->put('datosMigratorios.observacion', $this->observacion);
    }
}
