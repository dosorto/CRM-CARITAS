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
        $this->inicializarCampos();
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

        // Obtener el array existente de 'datosPersonales' o inicializarlo como un array vacío
        $datosPersonales = session('datosPersonales', []);

        // Mezclar los datos validados con los datos existentes
        $datosPersonales = array_merge($datosPersonales, $validated);

        // Guardar los datos actualizados en la sesión
        session(['datosPersonales' => $datosPersonales]);


        $this->dispatch('datos-personales-validated')
            ->to(RegistrarMigrante::class);
    }

    public function inicializarCampos()
    {
        $this->nombres = session()->get('datosPersonales.nombres', '');
        $this->apellidos = session()->get('datosPersonales.apellidos', '');
        $this->fechaNacimiento = session()->get('datosPersonales.fechaNacimiento', '');
        $this->estadoCivil = session()->get('datosPersonales.estadoCivil', '');
        $this->tipoIdentificacion = session()->get('datosPersonales.tipoIdentificacion', '');
        $this->idPais = session()->get('datosPersonales.idPais', '');
        $this->sexo = session()->get('datosPersonales.sexo', '');
        $this->esLGBT = session()->get('datosPersonales.esLGBT', '');
    }
}