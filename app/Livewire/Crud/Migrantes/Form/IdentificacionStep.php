<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use Livewire\Component;

class IdentificacionStep extends Component
{
    public $identificacion;

    public function mount()
    {
        $this->identificacion = session('identificacion');
    }

    public function render()
    {
        return view('livewire.crud.migrantes.form.identificacion-step');
    }

    // Esta funcion es llamada por $parent. en nextStepButton
    public function nextStep()
    {
        $validated = $this->validate([
            'identificacion' => 'required',
        ]);

        session(['identificacion' => $validated['identificacion']]);

        $this->dispatch('identificacion-validated')
            ->to(RegistrarMigrante::class);
    }
}
