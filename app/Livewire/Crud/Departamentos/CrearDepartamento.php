<?php

namespace App\Livewire\Crud\Departamentos;

use App\Models\Departamento;
use App\Models\Pais;
use LivewireUI\Modal\ModalComponent;

class CrearDepartamento extends ModalComponent
{
    public $nombre_departamento;
    public $codigo_departamento;
    public $pais_id;
    public $paises;

    public function mount()
    {
        
        $this->paises = Pais::all();
    }

    public function crear()
    {
        $nuevo_departamento = New Departamento;

        $nuevo_departamento->nombre_departamento = $this->nombre_departamento;
        $nuevo_departamento->codigo_departamento = $this->codigo_departamento;
        $nuevo_departamento->pais_id = $this->pais_id;

        $nuevo_departamento->save();

        $this->dispatch('departamento-creado');

        $this->closeModal();

    }
    public function render()
    {
        return view('livewire.crud.departamentos.crear-departamento');
    }
}
