<?php

namespace App\Livewire\Crud\Ciudades;

use App\Models\Ciudad;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Departamento;

class EditarCiudad extends ModalComponent
{
    public $id;
    public $nombre_ciudad;
    public $departamento_seleccionado = true;
    public $departamento;
    public $texto_busqueda = '';
    public $nombre_departamento;

    public function mount($id)
    {
        
        $ciudad = Ciudad::find($id);
        $this->id = $id;
        $this->nombre_ciudad = $ciudad->nombre_ciudad;
        $this->departamento = $ciudad->departamento;

    }

    // public function mount($id)
    // {
    //     $this->id = $id;
    //     $ciudad = Ciudad::find($id);
    //     $this->nombre_ciudad = $ciudad->nombre_ciudad;
    //     $this->departamento_id = $ciudad->departamento->id;
    // }

    public function seleccionar_departamento($id)
    {
        $this->departamento_seleccionado = true;
        $this->departamento = Departamento::find($id);
    }

    public function limpiar_departamento()
    {
        $this->departamento = null;
        $this->departamento_seleccionado = false;
    }

    public function filtrar()
    {
        return Departamento::where('nombre_departamento', 'like', '%' . $this->texto_busqueda . '%')->get();
    }

    public function editar()
    {
        $ciudad = Ciudad::find($this->id);

        $ciudad->nombre_ciudad = $this->nombre_ciudad;
        $ciudad->departamento_id = $this->departamento->id;

        $ciudad->save();

        $this->dispatch('ciudad-editada');
        $this->closeModal();
    }


    public function render()
    {
        $departamentos_filtrados = $this->filtrar();
        return view('livewire.crud.ciudades.editar-ciudad')
            ->with('departamentos_filtrados', $departamentos_filtrados);
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
