<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
use Livewire\Component;

class InfoMigranteModal extends Component
{
    public $iconSize;
    public $btnSize;
    public $label;
    public $persona;
    public $idModal;

    public function mount($iconSize = 4, $btnSize = '', $label = '', $personaId, $idModal)
    {
        $this->iconSize = $iconSize;
        $this->btnSize = $btnSize;
        $this->label = $label;
        $this->persona = Migrante::find($personaId);
        $this->idModal = $idModal;
    }

    public function render()
    {
        return view('livewire.crud.migrantes.info-migrante-modal');
    }
}
