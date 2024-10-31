<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Models\Pais;
use Livewire\Component;
use App\Livewire\Crud\Migrantes\RegistrarMigrante;

class DatosPersonalesStep extends Component
{
    public $identificacion;
    public $paises;

    public $nombres;

    public $apellidos;
    public $fechaNacimiento;
    public $estadoCivil;
    public $tipoIdentificacion;
    public $idPais;
    public $sexo;
    public $esLGBT;


    public function mount()
    {
        $this->paises = Pais::all();
    }

    public function render()
    {
        return view('livewire.crud.migrantes.form.datos-personales-step');
    }

    // Esta funcion es llamada por $parent. en nextStepButton
    public function nextStep()
    {
        $validated = $this->validate([
            'nombres' => 'required',
            // 'apellidos' => 'required',
            // 'fechaNacimiento' => 'required',
            // 'estadoCivil' => 'required',
            // 'tipoIdentificacion' => 'required',
            // 'idPais' => 'required',
            // 'sexo' => 'required',
            // 'esLGBT' => 'required',
        ]);



        $this->dispatch('datos-personales-validated', datosPersonales: $validated)
            ->to(RegistrarMigrante::class);
    }
}
