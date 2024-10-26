<?php

namespace App\Livewire\Crud\Ciudades;

use App\Models\Departamento;
use Livewire\Component;

class EditarCiudadModal extends Component
{
    public $item;
    public $Nombre;
    public $IdDepto;
    public $deptos;
    public $idModal;
    
    public function editItem()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'IdDepto' => 'required',
        ]);

        $ciudadEdited = $this->item;
        $ciudadEdited->nombre_ciudad = $validated['Nombre'];
        $ciudadEdited->departamento_id = $validated['IdDepto'];

        $ciudadEdited->save();
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }

    public function initForm()
    {
        $this->Nombre = $this->item->nombre_ciudad;
        $this->IdDepto = $this->item->departamento->id;
        $this->deptos = Departamento::all();
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.ciudades.editar-ciudad-modal');
    }
}
