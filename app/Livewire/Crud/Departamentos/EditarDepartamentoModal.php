<?php

namespace App\Livewire\Crud\Departamentos;

use App\Models\Pais;
use Livewire\Component;

class EditarDepartamentoModal extends Component
{
    public $depto;
    public $Nombre;
    public $Codigo;
    public $IdPais;
    public $paises;
    
    public function edit()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'Codigo' => 'required',
            'IdPais' => 'required',
        ]);

        $deptoEdited = $this->depto;
        $deptoEdited->nombre_departamento = $validated['Nombre'];
        $deptoEdited->codigo_departamento = $validated['Codigo'];
        $deptoEdited->pais_id = $validated['IdPais'];

        $deptoEdited->save();
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }

    public function initForm()
    {
        $this->Nombre = $this->depto->nombre_departamento;
        $this->Codigo = $this->depto->codigo_departamento;
        $this->IdPais = $this->depto->pais->id;
        $this->paises = Pais::all();
    }

    public function mount($parameters)
    {
        $this->depto = $parameters['item'];
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.departamentos.editar-departamento-modal');
    }
}
