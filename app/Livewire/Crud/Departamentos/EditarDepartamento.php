<?php

namespace App\Livewire\Crud\Departamentos;

use LivewireUI\Modal\ModalComponent;
use App\Models\Departamento;
use App\Models\Pais;

class EditarDepartamento extends ModalComponent
{
    public $id;
    public $nombre_departamento;
    public $codigo_departamento;
    //public $pais_id;
    public $paises;
    public $texto_busqueda = '';
    public $pais_seleccionado = true;
    public $pais;

    public function mount($id)
    {
        $departamento = Departamento::find($id);
        $this->id = $id;
        $this->nombre_departamento = $departamento->nombre_departamento;
        $this->codigo_departamento = $departamento->codigo_departamento;
        $this->pais = $departamento->pais;
    }

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

    public function editar()
    {
        $nuevo_departamento = Departamento::find($this->id);

        $nuevo_departamento->nombre_departamento = $this->nombre_departamento;
        $nuevo_departamento->codigo_departamento = $this->codigo_departamento;
        $nuevo_departamento->pais_id = $this->pais->id;

        $nuevo_departamento->save();

        $this->dispatch('departamento-editado', id: $nuevo_departamento->id);

        $this->closeModal();
    }

    public function render()
    {
        $paises_filtrados = $this->filtrar();
        return view('livewire.crud.departamentos.editar-departamento')
            ->with('paises_filtrados', $paises_filtrados);
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
