<?php

namespace App\Livewire\Crud\Faltas;

use App\Livewire\Components\ContentTable;
use App\Models\Falta;
use App\Models\GravedadFalta;
use Livewire\Component;

class CrearFaltaModal extends Component
{
    public $Falta;
    public $GravedadId;
    public $Gravedades = [];
    public $idModal;

    public function create()
    {
        $this->validate([
            'Falta' => 'required',
            'GravedadId' => 'required'
        ]);

        $newFalta = new Falta();
        $newFalta->falta = $this->Falta;
        $newFalta->gravedad_falta_id = $this->GravedadId;
        $newFalta->save();

        // Se envía el evento de item-created a la tabla para que actualice su contenido.
        $this->dispatch('item-created')->to(ContentTable::class);

        $this->closeModal();
    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->GravedadId = 1;
        $this->Gravedades = GravedadFalta::select('id', 'gravedad_falta')->get();
    }

    public function render()
    {
        return view('livewire.crud.faltas.crear-falta-modal');
    }

    public function resetForm()
    {
        $this->GravedadId = 1;
        $this->Falta = '';
    }

    public function closeModal()
    {
        $this->dispatch('close-modal')->self();
        $this->resetForm();
    }
}
