<?php

namespace App\Livewire\Crud\Ciudades;

use App\Models\Departamento;
use Livewire\Component;

class EditarCiudadModal extends Component
{
    public $ciudad;
    public $Nombre;
    public $IdDepto;
    public $deptos;
    
    public function editItem()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'IdDepto' => 'required',
        ]);

        $ciudadEdited = $this->ciudad;
        $ciudadEdited->nombre_ciudad = $validated['Nombre'];
        $ciudadEdited->departamento_id = $validated['IdDepto'];

        $ciudadEdited->save();
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }

    public function initForm()
    {
        $this->Nombre = $this->ciudad->nombre_ciudad;
        $this->IdDepto = $this->ciudad->departamento->id;
        $this->deptos = Departamento::all();
    }

    public function mount($parameters)
    {
        $this->ciudad = $parameters['item'];
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.ciudades.editar-ciudad-modal');
    }
}
