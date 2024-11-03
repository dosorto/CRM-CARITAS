<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Models\Migrante;
use Livewire\Component;
use Livewire\WithPagination;

class FamiliarStep extends Component
{
    use WithPagination;

    public $viajaEnGrupo;
    public $tieneFamiliar;

    public $colSelected;
    public $textToFind;


    protected $personas;
    public $codigoFamiliar;

    public $familiar;

    public function selectRelated($persona)
    {
        $this->familiar = $persona;
    }

    public function filtrar()
    {
        return Migrante::select('id', 'primer_nombre', 'primer_apellido', 'segundo_nombre', 'segundo_apellido', 'numero_identificacion', 'pais_id')
            ->when($this->colSelected === 'nombre_completo', function ($query) {

                $nombreCompleto = '%' . str_replace(' ', '%', $this->textToFind) . '%';
                return $query->whereRaw("CONCAT(primer_nombre, ' ', segundo_nombre, ' ', primer_apellido, ' ', segundo_apellido) LIKE ?", [$nombreCompleto]);
            }, function ($query) {
                return $query->where($this->colSelected, 'LIKE', '%' . $this->textToFind . '%');
            })
            ->with('pais')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function mount()
    {
        $this->viajaEnGrupo = true;
        $this->tieneFamiliar = true;
        $this->colSelected = 'nombre_completo';
        $this->textToFind = '';
        $this->codigoFamiliar = Migrante::max('codigo_familiar') + 1;
    }

    public function render()
    {
        $this->textToFind === '' ?
            $personas = Migrante::select('id', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'numero_identificacion', 'pais_id')
            ->with('pais')
            ->paginate(10)
            :
            $personas = $this->filtrar();

        return view('livewire.crud.migrantes.form.familiar-step')
        ->with('personas', $personas);
    }
}
