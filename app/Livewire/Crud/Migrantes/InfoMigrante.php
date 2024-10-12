<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
use LivewireUI\Modal\ModalComponent;

class InfoMigrante extends ModalComponent
{
    protected $id;
    public function mount($id)
    {
        $this->id =  $id;
    }

    public function render()
    {
        return view('livewire.crud.migrantes.info-migrante')
            ->with('migrante', Migrante::find($this->id));
    }
}
