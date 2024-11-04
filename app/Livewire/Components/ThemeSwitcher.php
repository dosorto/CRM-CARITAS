<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ThemeSwitcher extends Component
{
    public $customClass;

    public function mount($customClass)
    {
        $this->$customClass = $customClass;
    }

    public function render()
    {
        return view('livewire.components.theme-switcher');
    }
}
