<?php

namespace App\Livewire\Pages\Donaciones;

use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy()]
class DonacionPage extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
                <div class="size-full h-screen flex items-center justify-center">
                    <span class="loading loading-ring loading-lg"></span>
                </div>
                HTML;
    }

    public function render()
    {
        return view('livewire.pages.donaciones.donacion-page');
    }
}
