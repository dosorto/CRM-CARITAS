<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Models\Pais;
use Livewire\Component;
use App\Livewire\Crud\Migrantes\RegistrarMigrante;

class DatosPersonalesStep extends Component
{
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
        $this->paises = Pais::select('id', 'nombre_pais')->get();

        // session()->flush();
        // dd(session('datosPersonales'));
        if (session('datosPersonales'))
        {
            $this->nombres = session('datosPersonales')['nombres'];
            $this->apellidos = session('datosPersonales')['apellidos'];
            $this->fechaNacimiento = session('datosPersonales')['fechaNacimiento'];
            $this->estadoCivil = session('datosPersonales')['estadoCivil'];
            $this->tipoIdentificacion = session('datosPersonales')['tipoIdentificacion'];
            $this->idPais = session('datosPersonales')['idPais'];
            $this->sexo = session('datosPersonales')['sexo'];
            $this->esLGBT = session('datosPersonales')['esLGBT'];
        }
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
            'apellidos' => 'required',
            'fechaNacimiento' => 'required',
            'estadoCivil' => 'required',
            'tipoIdentificacion' => 'required',
            'idPais' => 'required',
            'sexo' => 'required',
            'esLGBT' => 'required',
        ]);

        session(['datosPersonales' => $validated]);

        $this->dispatch('datos-personales-validated')
            ->to(RegistrarMigrante::class);
    }
}
