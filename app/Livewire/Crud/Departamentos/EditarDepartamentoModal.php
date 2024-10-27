<?php

namespace App\Livewire\Crud\Departamentos;

use App\Models\Pais;
use Livewire\Component;

class EditarDepartamentoModal extends Component
{
    public $item;
    public $Nombre;
    public $Codigo;
    public $IdPais;
    public $paises;
    public $idModal;
    
    public function editItem()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'Codigo' => 'required',
            'IdPais' => 'required',
        ]);

        $deptoEdited = $this->item;
        $deptoEdited->nombre_departamento = $validated['Nombre'];
        $deptoEdited->codigo_departamento = $validated['Codigo'];
        $deptoEdited->pais_id = $validated['IdPais'];
        $deptoEdited->save();
        $this->dispatch('close-modal');
        $this->dispatch('item-edited');
    }

    public function resetForm()
    {
        $this->Nombre = $this->item->nombre_departamento;
        $this->Codigo = $this->item->codigo_departamento;
        $this->IdPais = $this->item->pais->id;
        $this->paises = Pais::all();
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.crud.departamentos.editar-departamento-modal');
    }
}
