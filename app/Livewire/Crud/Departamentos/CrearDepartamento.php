<?php

namespace App\Livewire\Crud\Departamentos;

use App\Models\Departamento;
use App\Models\Pais;
use LivewireUI\Modal\ModalComponent;

class CrearDepartamento extends ModalComponent
{
    public $nombre_departamento;
    public $codigo_departamento;
    // public $pais_id;
    public $paises;
    public $texto_busqueda = '';
    public $pais_seleccionado = false;
    public $pais;


    public function seleccionar_pais($id)
    {
        $this->pais_seleccionado = true;
        $this->pais = Pais::find($id);
    }

    public function limpiarPais()
    {
        $this->pais = null;
        $this->pais_seleccionado = false;
    }

    public function filtrar()
    {
        return Pais::where('nombre_pais', 'like', '%' . $this->texto_busqueda . '%')->get();
    }

    public function crear()
    {
        $nuevo_departamento = new Departamento;

        $nuevo_departamento->nombre_departamento = $this->nombre_departamento;
        $nuevo_departamento->codigo_departamento = $this->codigo_departamento;
        $nuevo_departamento->pais_id = $this->pais->id;

        $nuevo_departamento->save();

        $this->dispatch('departamento-creado');

        $this->closeModal();
    }

    public function render()
    {
        $paises_filtrados = $this->filtrar();
        return view('livewire.crud.departamentos.crear-departamento')
            ->with('paises_filtrados', $paises_filtrados);
    }
}
