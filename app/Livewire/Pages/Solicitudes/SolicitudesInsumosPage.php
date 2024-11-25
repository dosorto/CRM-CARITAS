<?php

namespace App\Livewire\Pages\Solicitudes;

use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class SolicitudesInsumosPage extends Component
{
    public function render()
    {
        return view('livewire.pages.solicitudes.solicitudes-insumos-page');
    }
}