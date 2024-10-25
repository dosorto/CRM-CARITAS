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

    public function crear()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'Codigo' => 'required',
            'IdPais' => 'required',
        ]);

        $nuevoDepto = new Departamento();
        $nuevoDepto->nombre_departamento = $validated['Nombre'];
        $nuevoDepto->codigo_departamento = $validated['Alfa3'];
        $nuevoDepto->pais_id = $validated['Numerico'];

        $nuevoDepto->save();
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-created');
    }

    public function mount()
    {
        $this->paises = Pais::all();
    }

    public function render()
    {
        return view('livewire.crud.departamentos.crear-departamento-modal');
    }
}
