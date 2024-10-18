<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
use Livewire\Attributes\On;
use Illuminate\Validation\ValidationException;
use App\Models\Pais;

use Livewire\Component;

class CrearMigrante extends Component
{
    // Paso 1 y 2, datos personales
    public $datosPersonales = [];

    // Paso 3, familiar
    public $tieneFamiliar = true;
    public $familiar_seleccionado = false;
    public $texto_busqueda = '';
    public $atributo = 'numero_identificacion';
    public $familiar;
    public $codigoFamilia;


    // Control de pasos
    public $step;
    public $migranteEncontrado = 0;


    public function mount()
    {
        $this->step = 1;
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

    public function buscarExpediente()
    {
        try {
            // this function calls $this->rules()
            $this->validate();
            $this->migranteEncontrado = Migrante::where(
                'numero_identificacion',
                $this->datosPersonales['numeroIdentificacion']
            )->first();
        } catch (ValidationException $e) {
            session()->flash('error', 'Este campo es requerido.');
        }
    }


    public function rules()
    {
        switch ($this->step) {

                // Paso 1: Buscar por Identificación
            case 1:
                return [
                    'datosPersonales.numeroIdentificacion' => 'required',
                ];

                // Registrar Datos Personales
            case 2:
                return [
                    'datosPersonales.nombres' => 'required',
                    'datosPersonales.apellidos' => 'required',
                    'datosPersonales.tipoIdentificacion' => 'required',
                    'datosPersonales.estadoCivil' => 'required',
                    'datosPersonales.sexo' => 'required',
                    'datosPersonales.fechaNacimiento' => 'required',
                ];
            case 3:
                return [
                    'codigoFamilia' => 'required',
                ];


            default:
                return [
                    'codigoFamilia' => 'required',
                ];
        }
    }

    #[On('previous-step')]
    public function previousStep()
    {
        if ($this->step !== 1) {

            $this->step--;
        }
    }

    #[On('next-step')]
    public function nextStep()
    {
        try {
            // esta funcion llama a $this->rules()
            $this->validate();

            // validaciones del primer paso
            if ($this->step === 1) {
                // No ha buscado ninguna vez al migrante
                if ($this->migranteEncontrado === 0 || $this->datosPersonales['numeroIdentificacion'] === '') {
                    return session()->flash('error', 'Debe buscar el registro antes de avanzar');
                }
                // Encontró al migrante, se salta al paso 4.
                elseif ($this->migranteEncontrado) {
                    return $this->step = 4;
                }
                $this->migranteEncontrado = 0;
            }

            $this->step++;
        } catch (ValidationException $e) {
            session()->flash('error', 'Verifique que todos los campos necesarios estén llenos...');
        }
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



        // $nuevo_migrante->save();

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

    public function buscar()
    {
        $this->filtrar();
    }
}
