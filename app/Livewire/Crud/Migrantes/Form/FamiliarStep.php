<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Livewire\Crud\Migrantes\RegistrarMigrante;
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

        $this->nuevoCodigoFamiliar = $this->getMigranteService()->generateNewFamiliarCode();

        // Esto es para mostrar el nombre del pais en el modal de confirmacion
        // $idPais = session('datosPersonales.idPais') ?? 74;
        // $pais = Pais::select('nombre_pais')->where('id', $idPais)->get()->first();
        // $this->pais = $pais->nombre_pais;
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
                    $this->familiarSeleccionado = null;
                }
            } else {
                $this->tieneFamiliar = false;
                $this->codigoFamiliar = 0;
                $this->familiarSeleccionado = null;
            }
            session(['formMigranteData.viajaEnGrupo' => $this->viajaEnGrupo]);
        }

        if ($property === 'tieneFamiliar') {
            if (!$this->tieneFamiliar) {
                $this->codigoFamiliar = $this->nuevoCodigoFamiliar;
                $this->familiarSeleccionado = null;
            }
            session(['formMigranteData.tieneFamiliar' => $this->tieneFamiliar]);
        }

        $this->errorFamiliar = false;
    }

    public function selectRelated($personaId)
    {
        $this->familiarSeleccionado = $this->getMigranteService()->buscar('id', $personaId);
        $this->errorFamiliar = false;
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

        session(['formMigranteData.migrante.codigoFamiliar' => $this->codigoFamiliar]);
        $this->dispatch('familiar-validated')->to(RegistrarMigrante::class);

    }

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }
}
