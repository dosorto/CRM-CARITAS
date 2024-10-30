<?php

namespace App\Livewire\Crud\Ciudades;

use App\Livewire\Components\ContentTable;
use App\Models\Ciudad;
use Livewire\Component;
use App\Models\Departamento;

class CrearCiudadModal extends Component
{
    public $Nombre;
    public $IdDepto;
    public $idModal;
    public $deptos;
    

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->deptos = Departamento::select('id', 'nombre_departamento')->get();;
    }

    public function render()
    {
        return view('livewire.crud.ciudades.crear-ciudad-modal');
    }

    public function create()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'IdDepto' => 'required',
        ]);

        $ciudadNueva = new Ciudad();
        $ciudadNueva->nombre_ciudad = $validated['Nombre'];
        $ciudadNueva->departamento_id = $validated['IdDepto'];

        $ciudadNueva->save();

        $this->dispatch('close-modal')->self();
        $this->dispatch('item-created')->to(ContentTable::class);
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->deptos = Departamento::select('id', 'nombre_departamento')->get();
        $this->Nombre = '';
    }


}
