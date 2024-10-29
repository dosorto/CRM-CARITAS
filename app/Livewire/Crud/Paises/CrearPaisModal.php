<?php

namespace App\Livewire\Crud\Paises;

use App\Livewire\Components\ContentTable;
use App\Models\Pais;
use Livewire\Component;

class CrearPaisModal extends Component
{
    /*
        -------------------------------------------
        Hay mas documentacion en EditarPaisModal Xd
        -------------------------------------------
    */

    public $Nombre;
    public $Alfa3;
    public $Numerico;
    public $idModal;

    public function mount($idModal)
    {
        // Inicializa el identificador unico del modal
        $this->idModal = $idModal;
    }

    public function render()
    {
        return view('livewire.crud.paises.crear-pais-modal');
    }

    public function create()
    {
        // Valida los datos de los inputs ingresados
        $validated = $this->validate([
            'Nombre' => 'required',
            'Alfa3' => 'required|size:3',
            'Numerico' => 'required|size:3',
        ]);

        // Logica para crear el pais, se usan los datos validados con $validated
        $nuevoPais = new Pais;
        $nuevoPais->nombre_pais = $validated['Nombre'];
        $nuevoPais->codigo_alfa3 = $validated['Alfa3'];
        $nuevoPais->codigo_numerico = $validated['Numerico'];

        $nuevoPais->save();

        $this->dispatch('item-created')->to(ContentTable::class);
        $this->dispatch('close-modal')->self();
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->Nombre = '';
        $this->Alfa3 = '';
        $this->Numerico = '';
    }
}
