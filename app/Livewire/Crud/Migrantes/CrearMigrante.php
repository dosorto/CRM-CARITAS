<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
use App\Models\Pais;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Attributes\Layout;

class CrearMigrante extends Component
{
    // Paso 1, datos personales
    public $datosPersonales = [];

    // public $nombres;
    // public $apellidos;
    // public $tipo_identificacion;
    // public $numero_identificacion;
    // public $estado_civil;
    // public $sexo;
    // public $es_lgbt = false;
    // public $pais_id;
    // public $fecha_nacimiento;

    // paso 2, datos familiares
    public $codigoFamilia;


    // variables para búsqueda familiar
    public $tiene_familiar = false;
    public $familiar_seleccionado = false;
    public $texto_busqueda = '';
    public $atributo = 'numero_identificacion';
    public $familiar;

    // Variables para el control de los pasos
    public $step = 1;

    public function rules()
    {
        return $this->validarPaso();
    }

    public function validarPaso()
    {
        switch ($this->step) {
                // Datos Personales
            case 1:
                return [
                    'datosPersonales.nombres' => 'required',
                    // 'datosPersonales.apellidos' => 'required',
                    // 'datosPersonales.tipoIdentificacion' => 'required',
                    // 'datosPersonales.numeroIdentificacion' => 'required',
                    // 'datosPersonales.estadoCivil' => 'required',
                    // 'datosPersonales.sexo' => 'required',
                    // 'datosPersonales.idPais' => 'required',
                    // 'datosPersonales.fechaNacimiento' => 'required',
                ];

                // Registro Familiar
            case 2:
                return [
                    'codigoFamilia' => 'required'
                ];
            case 3:
                return [
                    
                ];


            default:
                return [];
        }
    }

    public function test()
    {
        dd($this->datosPersonales, $this->codigoFamilia);
    }

    public function nextStep()
    {
        try {

            // this function calls $this->rules()
            $this->validate();

            $this->step++;
        } catch (ValidationException $e) {

        }
    }

    public function previousStep()
    {
        $this->step--;
    }
    public function buscar()
    {
        $this->filtrar();
    }

    public function generarNuevoCodigoFamiliar()
    {
        $this->codigoFamilia = Migrante::orderByDesc('codigo_familiar')->limit(1)->get()[0]->codigo_familiar + 1;
    }

    public function limpiarFamiliar()
    {
        $this->familiar = null;
        $this->familiar_seleccionado = false;
        $this->generarNuevoCodigoFamiliar();
    }

    public function crear()
    {
        $nuevo_migrante = new Migrante;

        $nuevo_migrante->primer_nombre =
            $nuevo_migrante->segundo_nombre =
            $nuevo_migrante->primer_apellido =
            $nuevo_migrante->segundo_apellido =
            $nuevo_migrante->numero_identificacion =
            $nuevo_migrante->tipo_identificacion =
            $nuevo_migrante->estado_civil =
            $nuevo_migrante->es_lgbt =
            $nuevo_migrante->sexo =
            $nuevo_migrante->pais_id =
            $nuevo_migrante->fecha_nacimiento =
            $nuevo_migrante->codigo_familiar =

            $nuevo_migrante->save();

        $this->redirect('/migrantes');
    }

    public function seleccionarMigrante($id)
    {
        $this->familiar_seleccionado = true;
        $this->familiar = Migrante::find($id);
        $this->codigoFamilia = $this->familiar->codigo_familiar;
    }

    public function filtrar()
    {
        // En caso de que se tenga que buscar por ambos nombres o ambos apellidos
        // switch ($this->atributo) {
        //     case 'nombres':
        //         return Migrante::where('primer_nombre', 'like', '%' . $this->texto_busqueda . '%')
        //             ->orWhere('segundo_nombre', 'like', '%' . $this->texto_busqueda . '%')->get();

        //     case 'apellidos':
        //         return Migrante::where('primer_apellido', 'like', '%' . $this->texto_busqueda . '%')
        //             ->orWhere('segundo_apellido', 'like', '%' . $this->texto_busqueda . '%')->get();
        // }

        return Migrante::where($this->atributo, 'like', '%' . $this->texto_busqueda . '%')->get();
    }

    public function limpiarFiltro()
    {
        $this->texto_busqueda = '';
    }

    public function mount()
    {
        $this->generarNuevoCodigoFamiliar();
    }

    public function render()
    {
        $migrantes_filtrados = $this->texto_busqueda == '' ? collect([]) : $this->filtrar();
        $paises = Pais::all();
        return view('livewire.crud.migrantes.crear-migrante')
            ->with('migrantes_filtrados', $migrantes_filtrados)
            ->with('paises', $paises);
    }
}
