<?php

namespace App\Livewire\Crud\Migrantes\Form;

use Livewire\Component;
use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use App\Models\Discapacidad;
use App\Models\Necesidad;

class SituacionStep extends Component
{
    public $necesidadesSelected = [];
    public $necesidades = [];

    // public $situacionesSelected = [];
    // public $situaciones = [];

    public $discapacidadesSelected = [];
    public $discapacidades = [];

    public $observacion = '';

    public function mount()
    {
        $this->necesidades = Necesidad::select('id', 'necesidad')->get();
        // $this->situaciones = SituacionMigratoria::select('id', 'situacion_migratoria')->get();
        $this->discapacidades = Discapacidad::select('id', 'discapacidad')->get();

        $this->necesidadesSelected = session('datosMigratorios.necesidadesSelected', []);
        $this->discapacidadesSelected = session('datosMigratorios.discapacidadesSelected', []);
        $this->observacion = session('datosMigratorios.observacion', '');
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
        ]);

        $this->dispatch('situacion-validated')
            ->to(RegistrarMigrante::class);
    }


    public function updated()
    {
        session()->put('datosMigratorios.necesidadesSelected', $this->necesidadesSelected);
        session()->put('datosMigratorios.discapacidadesSelected', $this->discapacidadesSelected);
        session()->put('datosMigratorios.observacion', $this->observacion);
    }
}