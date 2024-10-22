<?php

namespace App\Livewire\Components;

use Livewire\Component;

class LimpiarFiltros extends Component
{
    public function limpiar()
    {
        $this->dispatch('limpiar-filtros-clicked')->to(BuscadorDinamico::class);
    }

    public function render()
    {
        return view('livewire.components.limpiar-filtros');
    }
}
