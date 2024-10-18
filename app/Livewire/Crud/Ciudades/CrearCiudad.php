<?php

namespace App\Livewire\Crud\Ciudades;

use App\Models\Ciudad;
use App\Models\Departamento;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CrearCiudad extends ModalComponent
{

    public $nombre_ciudad;
    public $departamento_id;
    public $departamento_seleccionado = false;
    public $departamento;
    public $texto_busqueda = '';

    public function crear()
    {
        $nueva_ciudad = new Ciudad;
        $nueva_ciudad->nombre_ciudad = $this->nombre_ciudad;
        $nueva_ciudad->departamento_id = $this->departamento->id;

        $nueva_ciudad->save();

        $this->dispatch('ciudad-creada');
        $this->closeModal();
    }

    public function seleccionar_departamento($departamento_id)
    {
        $this->departamento_seleccionado = true;
        $this->departamento = Departamento::find($departamento_id);
    }

    public function limpiarDepartamento()
    {
        $this->departamento = null;
        $this->departamento_seleccionado = false;
    }

    public function filtrar()
    {
        return Departamento::where('nombre_departamento', 'like', '%' . $this->texto_busqueda . '%')->get();
    }

    public function render()
    {
        $departamentos_filtrados = $this->filtrar();
        return view('livewire.crud.ciudades.crear-ciudad')
            ->with('departamentos_filtrados', $departamentos_filtrados);
    }
}
