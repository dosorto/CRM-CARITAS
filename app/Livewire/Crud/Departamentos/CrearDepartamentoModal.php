<?php

namespace App\Livewire\Crud\Departamentos;

use App\Models\Departamento;
use Livewire\Component;
use App\Models\Pais;

class CrearDepartamentoModal extends Component
{
    public $Nombre;
    public $Codigo;
    public $IdPais;
    public $paises;
    public $idModal;

    public function create()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'Codigo' => 'required',
            'IdPais' => 'required',
        ]);

        $nuevoDepto = new Departamento();
        $nuevoDepto->nombre_departamento = $validated['Nombre'];
        $nuevoDepto->codigo_departamento = $validated['Codigo'];
        $nuevoDepto->pais_id = $validated['IdPais'];

        $nuevoDepto->save();
        $this->dispatch('close-modal');
        $this->dispatch('item-created');
    }

    public function resetForm()
    {
        $this->paises = Pais::all();
        $this->Nombre = '';
        $this->Codigo = '';
        // Honduras
        $this->IdPais = 74;
    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.crud.departamentos.crear-departamento-modal');
    }
}
