<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Models\Pais;
use Livewire\Component;
use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use Livewire\Attributes\On;

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
    public $tipoSangre;


    public function mount()
    {
        $this->paises = Pais::select('id', 'nombre_pais')->get();
        $this->inicializarCampos();
    }

    public function render()
    {
        return view('livewire.crud.migrantes.form.datos-personales-step');
    }

    // #[On('validate-datos-personales')]
    public function validateDatosPersonales()
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
            'tipoSangre' => 'required',
        ]);

        // Hasta que fueron validados se guardan en la variable de session
        session([
            'formMigranteData.datosPersonales.nombres' => $validated['nombres'],
            'formMigranteData.datosPersonales.apellidos' => $validated['apellidos'],
            'formMigranteData.datosPersonales.fechaNacimiento' => $validated['fechaNacimiento'],
            'formMigranteData.datosPersonales.estadoCivil' => $validated['estadoCivil'],
            'formMigranteData.datosPersonales.tipoIdentificacion' => $validated['tipoIdentificacion'],
            'formMigranteData.datosPersonales.idPais' => $validated['idPais'],
            'formMigranteData.datosPersonales.sexo' => $validated['sexo'],
            'formMigranteData.datosPersonales.esLGBT' => $validated['esLGBT'],
            'formMigranteData.datosPersonales.tipoSangre' => $validated['esLGBT'],
        ]);

        // Se manda el evento para avisar que los datos fueron validados y guardados en session
        $this->dispatch('identificacion-validated')->to(RegistrarMigrante::class);
    }

    public function inicializarCampos()
    {
        $this->nombres = session()->get('formMigranteData.datosPersonales.nombres', '');
        $this->apellidos = session()->get('formMigranteData.datosPersonales.apellidos', '');
        $this->fechaNacimiento = session()->get('formMigranteData.datosPersonales.fechaNacimiento', '');
        $this->estadoCivil = session()->get('formMigranteData.datosPersonales.estadoCivil', '');
        $this->tipoIdentificacion = session()->get('formMigranteData.datosPersonales.tipoIdentificacion', '');
        $this->idPais = session()->get('formMigranteData.datosPersonales.idPais', '');
        $this->sexo = session()->get('formMigranteData.datosPersonales.sexo', '');
        $this->esLGBT = session()->get('formMigranteData.datosPersonales.esLGBT', '');
        $this->esLGBT = session()->get('formMigranteData.datosPersonales.tipoSangre', '');
    }
}
