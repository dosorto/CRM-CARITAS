<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use App\Models\AsesorMigratorio;
use App\Models\Frontera;
use App\Models\MotivoSalidaPais;
use App\Models\SituacionMigratoria;
use Livewire\Component;
use Illuminate\Validation\Rule;

class DatosMigratoriosStep extends Component
{
    
    public $fronteras = [];
    public $situaciones = [];
    public $asesoresMigratorios = [];

    public $fronteraId;
    public $situacionId;
    public $entidadId;


    public $motivosSalidaPais = [];
    public $motivosSeleccionados = [];

    public function render()
    {
        return view('livewire.crud.migrantes.form.datos-migratorios-step');
    }

    public function mount()
    {
        if (session()->has('datosMigratorios'))
        {
            $this->fronteraId = session('datosMigratorios')['fronteraId'];
            $this->situacionId = session('datosMigratorios')['situacionId'];
            $this->entidadId = session('datosMigratorios')['entidadReferencia'];
            $this->motivosSeleccionados = session('datosMigratorios')['motivosSeleccionados'];
        }

        $this->fronteras = Frontera::select('id','frontera')->get();
        $this->situaciones = SituacionMigratoria::select('id','situacion_migratoria')->get();
        $this->asesoresMigratorios = AsesorMigratorio::select('id','asesor_migratorio')->get();
        $this->motivosSalidaPais = MotivoSalidaPais::select('id','motivo_salida_pais')->get();
    }

    public function nextStep()
    {
        $validated = $this->validate([
            'fronteraId' => 'required',
            'situacionId' => 'required',
            'entidadId' => 'required',

            'motivosSeleccionados' => 'required|array|min:1',
            'motivosSeleccionados.*' => Rule::in($this->motivosSalidaPais),
        
        ]);
        dd($validated['motivosSeleccionados']);

        session(['datosMigratorios' => $validated]);

        $this->dispatch('datos-migratorios-validated')
            ->to(RegistrarMigrante::class);
    }
}
