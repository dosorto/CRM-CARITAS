<?php

namespace App\Livewire\Pages\Solicitudes;

use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class SolicitudesTrasladoPage extends Component
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

    public function render()
    {
        return view('livewire.pages.solicitudes.solicitudes-traslado-page');
    }
}
