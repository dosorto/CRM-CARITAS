<?php

namespace App\Livewire\Components;

use Livewire\Component;

class LinkCard extends Component
{
    public $title;
    public $cardWidth;
    public $iconSize;
    public $iconClass;
    public $route;

    public function render()
    {
        return view('livewire.components.link-card');
    }
}
