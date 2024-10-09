<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
use App\Models\Pais;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.no-sidebar')]
class CrearMigrante extends Component
{
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $numero_identificacion;
    public $tipo_identificacion;
    public $estado_civil;
    public $sexo;
    public $es_lgbt = false;
    public $pais_id;
    public $fecha_nacimiento;
    public $codigo_familia;

    // variables para búsqueda familiar
    public $tiene_familiar = false;
    public $familiar_seleccionado = false;
    public $texto_busqueda = '';
    public $atributo = 'numero_identificacion';
    public $familiar;

    public function buscar()
    {
        $this->filtrar();
    }

    public function generarNuevoCodigoFamiliar()
    {
        $this->codigo_familia = Migrante::orderByDesc('codigo_familiar')->limit(1)->get()[0]->codigo_familiar + 1;
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

        $nuevo_migrante->primer_nombre =  $this->primer_nombre;
        $nuevo_migrante->segundo_nombre =  $this->segundo_nombre;
        $nuevo_migrante->primer_apellido =  $this->primer_apellido;
        $nuevo_migrante->segundo_apellido =  $this->segundo_apellido;
        $nuevo_migrante->numero_identificacion =  $this->numero_identificacion;
        $nuevo_migrante->tipo_identificacion =  $this->tipo_identificacion;
        $nuevo_migrante->estado_civil =  $this->estado_civil;
        $nuevo_migrante->es_lgbt =  $this->es_lgbt;
        $nuevo_migrante->sexo =  $this->sexo;
        $nuevo_migrante->pais_id =  $this->pais_id;
        $nuevo_migrante->fecha_nacimiento =  $this->fecha_nacimiento;
        $nuevo_migrante->codigo_familiar = $this->codigo_familia;

        $nuevo_migrante->save();

        $this->redirect('/migrantes');
    }

    public function seleccionar_migrante($id)
    {
        $this->familiar_seleccionado = true;
        $this->familiar = Migrante::find($id);
        $this->codigo_familia = $this->familiar->codigo_familiar;
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
