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

    public function crear()
    {
        $nueva_ciudad = new Ciudad;
        $nueva_ciudad->nombre_ciudad = $this->nombre_ciudad;
        $nueva_ciudad->departamento_id = $this->departamento_id;

        $nueva_ciudad->save();

        $this->dispatch('ciudad-creada');
        $this->closeModal();

    }

    public function render()
    {

        $departamentos = Departamento::all();

        return view('livewire.crud.ciudades.crear-ciudad')
            ->with('departamentos', $departamentos);
    }
}
