<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Models\Migrante;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use App\Models\Pais;
use Illuminate\Validation\ValidationException;
use App\Services\MigranteService;

class FamiliarStep extends Component
{
    use WithPagination;

    public $viajaEnGrupo;
    public $tieneFamiliar;

    public $colSelected = 'Identificacion';
    public $textToFind = '';

    // Para el buscador
    public $fakeColNames =
    [
        'Identificacion' => 'numero_identificacion',
        'Nombre1' => 'primer_nombre',
        'Nombre2' => 'segundo_nombre',
        'Apellido1' => 'primer_apellido',
        'Apellido2' => 'segundo_apellido',
    ];

    public $personas = [];
    public $nuevoCodigoFamiliar;

    public $familiar;

    public $pais;


    public function mount()
    {
        if (session()->has('viajaEnGrupo') && session()->has('tieneFamiliar')) {
            $this->viajaEnGrupo = session('viajaEnGrupo');
            $this->tieneFamiliar = session('tieneFamiliar');
        } else {
            $this->viajaEnGrupo = false;
            $this->tieneFamiliar = false;
        }

        $this->nuevoCodigoFamiliar = $this->getMigranteService()->generateNewFamiliarCode();
        $this->personas = $this->getMigranteService()->getAllMigrantes();


        // Esto es para mostrar el nombre del pais en el modal de confirmacion
        $idPais = session('datosPersonales.idPais') ?? 74;
        $pais = Pais::select('nombre_pais')->where('id', $idPais)->get()->first();
        $this->pais = $pais->nombre_pais;
    }

    public function render()
    {
        return view('livewire.crud.migrantes.form.familiar-step');
    }


    public function updated($property)
    {
        if ($property === 'viajaEnGrupo' || $property === 'tieneFamiliar') {
            if (!$this->viajaEnGrupo || !$this->tieneFamiliar) {
                $this->familiar = null;
            }
        }

        if ($property === 'textToFind') {
            $this->personas = $this->textToFind === '' ?
                $this->getMigranteService()->getAllMigrantes()
                :
                $this->getMigranteService()->filtrar($this->fakeColNames[$this->colSelected], $this->textToFind);
        }
    }

    public function selectRelated($personaId)
    {
        $this->familiar = Migrante::find($personaId);
    }

    public function nextStep()
    {
        $datosPersonales = session('datosPersonales', []);
        if ($this->viajaEnGrupo && $this->tieneFamiliar && $this->familiar) {
            $datosPersonales['codigoFamiliar'] = $this->familiar->codigo_familiar;
            session(['datosPersonales' => $datosPersonales]);
        } else {
            $datosPersonales['codigoFamiliar'] = $this->nuevoCodigoFamiliar;
            session(['datosPersonales' => $datosPersonales]);
        }

        session([
            'viajaEnGrupo' => $this->viajaEnGrupo,
            'tieneFamiliar' => $this->tieneFamiliar
        ]);
        
        $this->dispatch('familiar-validated')
            ->to(RegistrarMigrante::class);
    }

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }
}