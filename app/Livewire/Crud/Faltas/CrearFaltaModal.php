<?php

namespace App\Livewire\Crud\Faltas;

use App\Livewire\Components\ContentTable;
use App\Livewire\Crud\Migrantes\SalidaMigrante\VerFaltasExpediente;
use App\Models\Falta;
use App\Models\GravedadFalta;
use Livewire\Component;

class CrearFaltaModal extends Component
{
    public $Falta;
    public $GravedadId;
    public $Gravedades = [];
    public $idModal;

    // parametros del boton
    public $iconSize;
    public $label;
    public $btnSize;

    public function mount($idModal, $iconSize = 6, $label = 'Añadir', $btnSize = 'md')
    {
        $this->idModal = $idModal;
        $this->GravedadId = 1;
        $this->Gravedades = GravedadFalta::select('id', 'gravedad_falta')->get();
        $this->iconSize = $iconSize;
        $this->label = $label;
        $this->btnSize = $btnSize;

    }


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

        $this->dispatch('falta-created')->to(VerFaltasExpediente::class);

        $this->closeModal();
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
