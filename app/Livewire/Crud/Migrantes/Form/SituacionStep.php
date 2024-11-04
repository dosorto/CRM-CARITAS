<?php

namespace App\Livewire\Crud\Migrantes\Form;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Livewire\Crud\Migrantes\RegistrarMigrante;

class SituacionStep extends Component
{
    public $necesidadesSelected = [];
    public $necesidades = [
        'Asilo',
        'Agua',
        'Comida',
        'Teléfono Celular',
        'Dinero',
        'Ropa',
        'Ducha',
    ];

    public $situacionesSelected = [];
    public $situaciones = [
        'Migrante en Tránsito',
        'Protección Internacional',
        'Refugiado',
        'Retornado',
        'Solicitante de Asilo',
    ];

    public $discapacidadesSelected = [];
    public $discapacidades = [
        'Poca Visión',
        'Ceguera total',
        'Autismo',
        'Síndrome de Down',
        'Herida Grave',
    ];

    public $observacion = '';

    public function nextStep()
    {
        $validated = $this->validate([
            'necesidadesSelected' => 'required|array|min:1',
            'necesidadesSelected.*' => Rule::in($this->necesidadesSelected),
            'situacionesSelected' => 'required|array|min:1',
            'situacionesSelected.*' => Rule::in($this->situacionesSelected),
        ]);

        session(['situaciones' => $validated['situacionesSelected']]);
        session(['necesidades' => $validated['necesidadesSelected']]);
        session(['discapacidades' => $validated['discapacidadesSelected']]);
        session(['observacion' => $this->observacion]);

        $this->dispatch('situacion-validated')
            ->to(RegistrarMigrante::class);
    }

    public function render()
    {
        return view('livewire.crud.migrantes.form.situacion-step');
    }
}
