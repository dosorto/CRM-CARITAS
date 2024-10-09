<?php

namespace App\Livewire\Crud\Departamentos;

use LivewireUI\Modal\ModalComponent;
use App\Models\Departamento;
use App\Models\Pais;

class EliminarDepartamento extends ModalComponent
{
    public $id;
    public $nombre_departamento;
    public $codigo_departamento;
    public $nombre_pais;

    public function mount($id)
    {
        $departamento = Departamento::with('pais')->find($id);

        $this->id = $id;
        $this->nombre_departamento = $departamento->nombre_departamento;
        $this->codigo_departamento = $departamento->codigo_departamento;
        $this->nombre_pais = $departamento->pais->nombre_pais;
    }

    public function eliminar()
    {
        $departamento = Departamento::find($this->id);

        if ($departamento) {
            $departamento->delete();
        }

        $this->closeModal();
        $this->dispatch('departamento-eliminado');

    }

    public function render()
    {
        return view('livewire.crud.departamentos.eliminar-departamento')
            ->with('nombre_departamento', $this->nombre_departamento);
    }
}
