<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
use Livewire\Component;

class RegistroConducta extends Component
{
    public $migranteId;
    public $migrante;

    public function mount($migranteId)
    {
        $this->migranteId = $migranteId;
        $this->migrante = Migrante::find($migranteId);
    }

    public function render()
    {
        return view('livewire.crud.migrantes.registro-conducta');
    }
}
