<?php

namespace App\Livewire\Components;

use Livewire\Component;

use App\Livewire\Components\ContentTable;

class BuscadorDinamico extends Component
{
    public $fakeColNames;
    public $colSelected;
    public $textToFind;
    public $counter = 0;
    public $isLoading = false;

    public function someMethod() {
        $this->isLoading = true;
        $this->isLoading = false;
    }

    public function mount($fakeColNames)
    {
        $this->fakeColNames = $fakeColNames;
        $this->colSelected = array_key_first($fakeColNames);
    }

    public function render()
    {
        $this->dispatch('search-text-changed', textToFind: $this->textToFind, colSelected: $this->fakeColNames[$this->colSelected]);
        return view('livewire.components.buscador-dinamico')
            ->with('fakeColNames', $this->fakeColNames);
    }
}
