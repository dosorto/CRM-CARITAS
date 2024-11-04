<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use Livewire\Component;
use Illuminate\Validation\Rule;

class DatosMigratoriosStep extends Component
{
    public $fronteraIngreso;
    public $situacionEncontrada;
    public $entidadReferencia;
    public $motivosSalidaPais = [
        'Amenazas',
        'Ayudar a la Familia',
        'Aspiración a Mejor Estudio',
        'Conflicto Armado',
        'Corrupción Política',
        'Crisis Económica',
        'Dictadura',
    ];
    public $motivosSeleccionados = [];

    public function render()
    {
        return view('livewire.crud.migrantes.form.datos-migratorios-step');
    }

    public function mount()
    {
        if (session()->has('datosMigratorios'))
        {
            $this->fronteraIngreso = session('datosMigratorios')['fronteraIngreso'];
            $this->situacionEncontrada = session('datosMigratorios')['situacionEncontrada'];
            $this->entidadReferencia = session('datosMigratorios')['entidadReferencia'];
            $this->motivosSeleccionados = session('datosMigratorios')['motivosSeleccionados'];
        }
    }

    public function nextStep()
    {
        $validated = $this->validate([
            'fronteraIngreso' => 'required',
            'situacionEncontrada' => 'required',
            'entidadReferencia' => 'required',
            'motivosSeleccionados' => 'required|array|min:1',
            'motivosSeleccionados.*' => Rule::in($this->motivosSalidaPais),
        ]);

        session(['datosMigratorios' => $validated]);

        $this->dispatch('datos-migratorios-validated')
            ->to(RegistrarMigrante::class);
    }
}
