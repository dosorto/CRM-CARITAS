<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Models\Migrante;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use Illuminate\Validation\ValidationException;

class FamiliarStep extends Component
{
    use WithPagination;

    public $viajaEnGrupo;
    public $tieneFamiliar;

    public $colSelected;
    public $textToFind;
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

    public function selectRelated($personaId)
    {
        $this->familiar = Migrante::find($personaId);
    }

    public function filtrar()
    {

        return Migrante::select('id', 'codigo_familiar', 'primer_nombre', 'primer_apellido', 'segundo_nombre', 'segundo_apellido', 'numero_identificacion', 'pais_id')
            ->with('pais')
            ->where($this->fakeColNames[$this->colSelected], 'LIKE', '%' . $this->textToFind . '%')
            ->get();

        // $colSelected = $this->colSelected === 'identificacion' ?
        //     'numero_identificacion'
        //     :
        //     $this->colSelected;


        // return Migrante::select('id', 'codigo_familiar', 'primer_nombre', 'primer_apellido', 'segundo_nombre', 'segundo_apellido', 'numero_identificacion', 'pais_id')
        //     ->when($colSelected === 'nombre_completo', function ($query) {

        //         $nombreCompleto = '%' . str_replace(' ', '%', $this->textToFind) . '%';
        //         return $query->whereRaw("CONCAT(primer_nombre, ' ', segundo_nombre, ' ', primer_apellido, ' ', segundo_apellido) LIKE ?", [$nombreCompleto]);
        //     }, function ($query) use ($colSelected) {
        //         return $query->where($colSelected, 'LIKE', '%' . $this->textToFind . '%');
        //     })
        //     ->with('pais')
        //     ->orderBy('id', 'desc')
        //     ->get();
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
