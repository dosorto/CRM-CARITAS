<?php

namespace App\Livewire\Crud\Ciudades;

use App\Models\Ciudad;
use Livewire\Component;
use App\Models\Departamento;

class CrearCiudadModal extends Component
{
    public $Nombre;
    public $idDepto;
    public $idModal;
    public $deptos;
    
    public function create()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'IdDepto' => 'required',
        ]);

        $ciudadEdited = new Ciudad();
        $ciudadEdited->nombre_ciudad = $validated['Nombre'];
        $ciudadEdited->departamento_id = $validated['idDepto'];

        $ciudadEdited->save();
        $this->dispatch('close-modal');
        $this->dispatch('item-created');
    }

    public function resetForm()
    {
        $this->deptos = Departamento::all();
        $this->Nombre = '';
    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.crud.ciudades.crear-ciudad-modal');
    }
}
