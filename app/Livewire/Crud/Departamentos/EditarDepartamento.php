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
    public $pais_id;
    public $paises;

    public function mount($id)
    {
        $this->paises = Pais::all();

        $departamento = Departamento::find($id);
        $this->id = $id;
        $this->nombre_departamento = $departamento->nombre_departamento;
        $this->codigo_departamento = $departamento->codigo_departamento;
        $this->pais_id = $departamento->pais_id;
    }

    public function editar()
    {
        $nuevo_departamento = Departamento::find($this->id);

        $nuevo_departamento->nombre_departamento = $this->nombre_departamento;
        $nuevo_departamento->codigo_departamento = $this->codigo_departamento;
        $nuevo_departamento->pais_id = $this->pais_id;

        $nuevo_departamento->save();

        $this->dispatch('departamento-editado', id: $nuevo_departamento->id);

        $this->closeModal();

    }

    public function render()
    {
        return view('livewire.crud.departamentos.editar-departamento');
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;   
    }
}
