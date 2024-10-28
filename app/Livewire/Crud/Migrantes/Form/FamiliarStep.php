<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Models\Migrante;
use Livewire\Component;

class FamiliarStep extends Component
{
    public $viajaEnGrupo = '1';
    public $tieneFamiliar = '1';

    public $persons = [];


    public function selectRelated($person)
    {
        dd($person);
    }

    public function mount()
    {
        $this->persons = Migrante::all();
    }

    public function render()
    {
        return view('livewire.crud.migrantes.form.familiar-step');
    }
}
