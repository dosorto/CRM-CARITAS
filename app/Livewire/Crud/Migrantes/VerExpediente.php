<?php

namespace App\Livewire\Crud\Migrantes;

use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy()]
class VerExpediente extends Component
{
    public function render()
    {
        return view('livewire.crud.migrantes.ver-expediente');
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }
}
