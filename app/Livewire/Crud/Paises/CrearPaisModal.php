<?php

namespace App\Livewire\Crud\Paises;

use App\Models\Pais;
use Livewire\Component;

class CrearPaisModal extends Component
{
    public $Nombre;
    public $Alfa3;
    public $Numerico;
    public $idModal;

    public function  create()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'Alfa3' => 'required|size:3',
            'Numerico' => 'required|size:3',
        ]);

        $nuevoPais = new Pais;
        $nuevoPais->nombre_pais = $validated['Nombre'];
        $nuevoPais->codigo_alfa3 = $validated['Alfa3'];
        $nuevoPais->codigo_numerico = $validated['Numerico'];

        $nuevoPais->save();

        $this->dispatch('item-created');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal');
    }

    public function resetForm()
    {
        $this->Nombre = '';
        $this->Alfa3 = '';
        $this->Numerico = '';
    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
    }

    public function render()
    {
        return view('livewire.crud.paises.crear-pais-modal');
    }
}
