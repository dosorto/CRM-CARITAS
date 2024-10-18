<?php

namespace App\Livewire\Crud\Migrantes;

use Livewire\Component;
use App\Models\Pais;
use App\Models\Migrante;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;

class EditarMigrante extends Component
{
    public $id;
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
    public $message = 'Código Familiar Actual:';

    public function buscar()
    {
        $this->filtrar();
    }

    public function filtrar()
    {
        return Migrante::where($this->atributo, 'like', '%' . $this->texto_busqueda . '%')->get();
    }

    public function generarNuevoCodigoFamiliar()
    {
        $this->codigo_familia = Migrante::orderByDesc('codigo_familiar')->limit(1)->get()[0]->codigo_familiar + 1;
        $this->message = 'Nuevo Código Familiar';
    }

    public function guardar()
    {
        $migrante_editado = Migrante::find($this->id);

        $migrante_editado->primer_nombre =  $this->primer_nombre;
        $migrante_editado->segundo_nombre =  $this->segundo_nombre;
        $migrante_editado->primer_apellido =  $this->primer_apellido;
        $migrante_editado->segundo_apellido =  $this->segundo_apellido;
        $migrante_editado->numero_identificacion =  $this->numero_identificacion;
        $migrante_editado->tipo_identificacion =  $this->tipo_identificacion;
        $migrante_editado->estado_civil =  $this->estado_civil;
        $migrante_editado->es_lgbt =  $this->es_lgbt;
        $migrante_editado->sexo =  $this->sexo;
        $migrante_editado->pais_id =  $this->pais_id;
        $migrante_editado->fecha_nacimiento =  $this->fecha_nacimiento;
        $migrante_editado->codigo_familiar = $this->codigo_familia;

        $migrante_editado->save();

        $this->redirect('/migrantes');
    }

    public function mount($id)
    {
        $this->id = $id;
        $migrante_a_editar = Migrante::find($this->id);

        $this->primer_nombre = $migrante_a_editar->primer_nombre;
        $this->segundo_nombre = $migrante_a_editar->segundo_nombre;
        $this->primer_apellido = $migrante_a_editar->primer_apellido;
        $this->segundo_apellido = $migrante_a_editar->segundo_apellido;
        $this->numero_identificacion = $migrante_a_editar->numero_identificacion;
        $this->tipo_identificacion = $migrante_a_editar->tipo_identificacion;
        $this->estado_civil = $migrante_a_editar->estado_civil;
        $this->es_lgbt = $migrante_a_editar->es_lgbt;
        $this->sexo = $migrante_a_editar->sexo;
        $this->pais_id = $migrante_a_editar->pais_id;
        $this->fecha_nacimiento = $migrante_a_editar->fecha_nacimiento;
        $this->codigo_familia = $migrante_a_editar->codigo_familiar;
    }

    public function seleccionar_migrante($id)
    {
        $this->familiar_seleccionado = true;
        $this->familiar = Migrante::find($id);
        $this->codigo_familia = $this->familiar->codigo_familiar;
    }

    public function render()
    {
        // dd('renderizado');
        $migrantes_filtrados = $this->texto_busqueda == '' ? collect([]) : $this->filtrar();
        $paises = Pais::all();
        return view('livewire.crud.migrantes.editar-migrante')
            ->with('migrantes_filtrados', $migrantes_filtrados)
            ->with('paises', $paises);
    }
}
