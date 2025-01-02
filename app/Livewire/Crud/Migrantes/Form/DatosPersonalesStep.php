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

    #[On('validate-datos-personales')]
    public function validateDatosPersonales()
    {
        $validated = $this->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'estadoCivil' => 'required',
            'fechaNacimiento' => 'required',
            'idPais' => 'required',
            'sexo' => 'required',
            'esLGBT' => 'required',
            'tipoSangre' => 'required',
        ]);

        // Hasta que fueron validados se guardan en la variable de session
        session([
            'formMigranteData.migrante.nombres' => $validated['nombres'],
            'formMigranteData.migrante.apellidos' => $validated['apellidos'],
            'formMigranteData.migrante.fechaNacimiento' => $validated['fechaNacimiento'],
            'formMigranteData.migrante.estadoCivil' => $validated['estadoCivil'],
            'formMigranteData.migrante.idPais' => $validated['idPais'],
            'formMigranteData.migrante.sexo' => $validated['sexo'],
            'formMigranteData.migrante.esLGBT' => $validated['esLGBT'],
            'formMigranteData.migrante.tipoSangre' => $validated['tipoSangre'],
        ]);

        // Se manda el evento para avisar que los datos fueron validados y guardados en session

        $this->dispatch('datos-personales-validated')->to(RegistrarMigrante::class);
    }

    public function inicializarCampos()
    {
        $this->nombres = session()->get('formMigranteData.migrante.nombres', '');
        $this->apellidos = session()->get('formMigranteData.migrante.apellidos', '');
        $this->fechaNacimiento = session()->get('formMigranteData.migrante.fechaNacimiento', '');
        $this->estadoCivil = session()->get('formMigranteData.migrante.estadoCivil', '');
        $this->idPais = session()->get('formMigranteData.migrante.idPais', '');
        $this->sexo = session()->get('formMigranteData.migrante.sexo', '');
        $this->esLGBT = session()->get('formMigranteData.migrante.esLGBT', '');
        $this->tipoSangre = session()->get('formMigranteData.migrante.tipoSangre', '');
        // dump(session()->all());
    }
}
