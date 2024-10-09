<?php

namespace App\Livewire\Crud\Ciudades;

use App\Models\Ciudad;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Departamento;

class EditarCiudad extends ModalComponent
{
    public $id;
    public $nombre_ciudad;
    public $departamento_id;

    public function mount($id)
    {
        $this->id = $id;
        $ciudad = Ciudad::find($id);
        $this->nombre_ciudad = $ciudad->nombre_ciudad;
        //$this->departamento_id = $ciudad->departamento->id;
    }

    public function editar()
    {
        $ciudad = Ciudad::find($this->id);

        $ciudad->nombre_ciudad = $this->nombre_ciudad;
        $ciudad->departamento_id = $this->departamento_id;

        $ciudad->save();

        $this->dispatch('ciudad-editada');
        $this->closeModal();
    }


    public function render()
    {
        $departamentos = Departamento::all();
        return view('livewire.crud.ciudades.editar-ciudad')
            ->with('departamentos', $departamentos);
    }
}
