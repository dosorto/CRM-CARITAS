<?php

namespace App\Livewire\Crud\Ciudades;

use App\Models\Ciudad;
use Livewire\Component;
use App\Models\Departamento;

class CrearCiudadModal extends Component
{
    public $Nombre;
    public $IdDepto;
    public $deptos;
    
    public function create()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'IdDepto' => 'required',
        ]);

        $ciudadEdited = new Ciudad();
        $ciudadEdited->nombre_ciudad = $validated['Nombre'];
        $ciudadEdited->departamento_id = $validated['IdDepto'];

        $ciudadEdited->save();
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-created');
    }

    public function initForm()
    {
        $this->deptos = Departamento::all();
        $this->Nombre = '';
    }

    public function mount()
    {
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.ciudades.crear-ciudad-modal');
    }
}
