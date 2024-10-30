<?php

namespace App\Livewire\Crud\Ciudades;

use App\Livewire\Components\ContentTable;
use App\Models\Departamento;
use Livewire\Component;

class EditarCiudadModal extends Component
{
    public $item;
    public $Nombre;
    public $IdDepto;
    public $deptos;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.crud.ciudades.editar-ciudad-modal');
    }

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

        $this->dispatch('update-delete-modal', id: $ciudadEdited->id)->to(EliminarCiudadModal::class);
        $this->dispatch('item-edited')->to(ContentTable::class);
        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->Nombre = $this->item->nombre_ciudad;
        $this->IdDepto = $this->item->departamento->id;
        $this->deptos = Departamento::select('id','nombre_departamento')->get();
    }
}
