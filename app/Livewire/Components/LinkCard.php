<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class LinkCard extends Component
{
    // Anillo de Cargando cuando el componente tarda
    public function placeholder()
    {
        return <<<'HTML'
            <div class="size-full h-screen flex items-center justify-center">
                <span class="loading loading-ring loading-lg"></span>
            </div>
            HTML;
    }
    
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
