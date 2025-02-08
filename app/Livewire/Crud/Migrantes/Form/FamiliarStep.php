<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use App\Models\Migrante;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\MigranteService;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;

class FamiliarStep extends Component
{
    use WithPagination;

    public $viajaEnGrupo;
    public $tieneFamiliar;

    public $colSelected = 'Identificación';
    public $textToFind = '';

    // Para el buscador
    public $fakeColNames =
    [
        'Identificación' => 'numero_identificacion',
        'Nombre' => 'primer_nombre',
    ];

    public $personas = [];
    public $nuevoCodigoFamiliar;
    public $codigoFamiliar = 0;

    public $familiarSeleccionado = null;
    public $errorFamiliar = false;

    public $pais;

    public function mount()
    {
        $this->viajaEnGrupo = session()->get('formMigranteData.viajaEnGrupo', false);
        $this->tieneFamiliar =  $this->viajaEnGrupo ? session()->get('formMigranteData.tieneFamiliar', false) : false;
        // $this->viajaEnGrupo = true;
        // $this->tieneFamiliar =  true;

        $this->nuevoCodigoFamiliar = $this->getMigranteService()->generateNewFamiliarCode();

        // obtener familiarSeleccionado de la session
        $this->familiarSeleccionado = session()->get('formMigranteData.migrante.familiarSeleccionado', null);

        if ($this->viajaEnGrupo && !$this->tieneFamiliar) {
            $this->codigoFamiliar = $this->nuevoCodigoFamiliar;
        }

        $this->personas = $this->getMigranteService()->obtenerCandidatosFamiliar();
    }

    public function render()
    {
        return view('livewire.crud.migrantes.form.familiar-step');
    }


    public function updated($property)
    {
        if ($property === 'viajaEnGrupo') {
            if ($this->viajaEnGrupo) {
                if (!$this->tieneFamiliar) {
                    $this->codigoFamiliar = $this->nuevoCodigoFamiliar ?? 0;
                }
            } else {
                $this->tieneFamiliar = false;
                $this->codigoFamiliar = 0;
                $this->familiarSeleccionado = null;
                session()->forget('formMigranteData.migrante.familiarSeleccionado');
            }
            session(['formMigranteData.viajaEnGrupo' => $this->viajaEnGrupo]);
            $this->errorFamiliar = false;

            $this->familiarSeleccionado = null;
            session()->forget('formMigranteData.migrante.familiarSeleccionado');
        }

        if ($property === 'tieneFamiliar') {
            if (!$this->tieneFamiliar) {
                $this->codigoFamiliar = $this->nuevoCodigoFamiliar ?? 0;
                $this->familiarSeleccionado = null;
            }
            session(['formMigranteData.tieneFamiliar' => $this->tieneFamiliar]);
            $this->errorFamiliar = false;

            $this->familiarSeleccionado = null;
            session()->forget('formMigranteData.migrante.familiarSeleccionado');
        }
    }

    public function selectFamiliar($personaId)
    {
        $this->familiarSeleccionado = $this->getMigranteService()->buscar('id', $personaId);
        $this->codigoFamiliar = $this->familiarSeleccionado->codigo_familiar;
        $this->errorFamiliar = false;
        session()->put('formMigranteData.migrante.familiarSeleccionado', $this->familiarSeleccionado);
    }


    #[On('validate-familiar')]
    public function validateFamiliarStep()
    {
        if ($this->viajaEnGrupo && $this->tieneFamiliar && !$this->familiarSeleccionado) {
            $this->errorFamiliar = true;
            throw ValidationException::withMessages([
                'familiarSeleccionado' => ['Por favor, complete las instrucciones.']
            ]);
        }

        session()->put('formMigranteData.migrante.codigoFamiliar', $this->codigoFamiliar);
        session()->put('formMigranteData.viajaEnGrupo', $this->viajaEnGrupo);
        session()->put('formMigranteData.tieneFamiliar', $this->tieneFamiliar);
        $this->dispatch('familiar-validated')->to(RegistrarMigrante::class);
    }

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }
}
