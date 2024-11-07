<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Models\Migrante;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use App\Models\Pais;
use Illuminate\Validation\ValidationException;

class FamiliarStep extends Component
{
    use WithPagination;

    public $viajaEnGrupo;
    public $tieneFamiliar;

    public $colSelected;
    public $textToFind;

    // Para el buscador
    public $fakeColNames =
    [
        'Identificacion' => 'numero_identificacion',
        'Nombre1' => 'primer_nombre',
        'Nombre2' => 'segundo_nombre',
        'Apellido1' => 'primer_apellido',
        'Apellido2' => 'segundo_apellido',
    ];

    public $personas;
    public $codigoFamiliar;

    public $familiar;

    public $pais;

    public function selectRelated($personaId)
    {
        $this->familiar = Migrante::find($personaId);
        $this->codigoFamiliar = $this->familiar->codigo_familiar;
    }

    public function filtrar()
    {

        return Migrante::select('id', 'codigo_familiar', 'primer_nombre', 'primer_apellido', 'segundo_nombre', 'segundo_apellido', 'numero_identificacion', 'pais_id')
            ->with('pais')
            ->where($this->fakeColNames[$this->colSelected], 'LIKE', '%' . $this->textToFind . '%')
            ->get();
    }

    public function mount()
    {
        if (session()->has('viajaEnGrupo') && session()->has('tieneFamiliar')) {
            $this->viajaEnGrupo = session('viajaEnGrupo');
            $this->tieneFamiliar = session('tieneFamiliar');
        } else {
            $this->viajaEnGrupo = false;
            $this->tieneFamiliar = false;
        }


        $this->colSelected = 'Identificacion';
        $this->textToFind = '';
        $this->codigoFamiliar = Migrante::max('codigo_familiar') + 1;

        // session(['codigoFamiliar' => $this->codigoFamiliar]);

        // Esto es para mostrar el nombre del pais en el modal de confirmacion
        $pais = Pais::select('nombre_pais')->where('id', session('datosPersonales')['idPais'])->get()->first();
        $this->pais = $pais->nombre_pais;
    }

    public function render()
    {
        $this->personas = $this->textToFind === '' ?
            Migrante::select('id', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'numero_identificacion', 'pais_id')
            ->with('pais')
            ->get()
            :
            $this->filtrar();

        return view('livewire.crud.migrantes.form.familiar-step');
    }

    public function nextStep()
    {
        if ($this->viajaEnGrupo && $this->tieneFamiliar) {
            if ($this->familiar) {
                session(['codigoFamiliar' => $this->familiar->codigo_familiar]);
            }
            else
            {
                throw ValidationException::withMessages([
                    'familiar' => 'Por favor, seleccione un familiar de la tabla.'
                ]);
            }
        } else {
            session(['codigoFamiliar' => $this->codigoFamiliar]);
        }

        session([
            'viajaEnGrupo' => $this->viajaEnGrupo,
            'tieneFamiliar' => $this->tieneFamiliar
        ]);
    
        $this->dispatch('familiar-validated')
            ->to(RegistrarMigrante::class);
    }
}
