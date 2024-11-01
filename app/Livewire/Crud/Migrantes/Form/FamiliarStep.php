<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Models\Migrante;
use Livewire\Component;

class FamiliarStep extends Component
{
    public $viajaEnGrupo = true;
    public $tieneFamiliar = true;

    public $colSelected = 'nombre_completo';
    public $textToFind = '';

    public $personas;

    public $codigoFamiliar;

    public function selectRelated($persona) {}

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
            ->get();
    }

    public function render()
    {
        $this->textToFind === '' ?
            $this->personas = Migrante::select('id', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'numero_identificacion', 'pais_id')
                                ->with('pais')->get()
            :
            $this->personas = $this->filtrar();

        // $this->personas = Migrante::all();

        return view('livewire.crud.migrantes.form.familiar-step');
    }
}
