<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use App\Services\MigranteService;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;

class IdentificacionStep extends Component
{
    public $identificacion;

    public function mount()
    {
        $this->identificacion = session()->get('formMigranteData.migrante.identificacion', '');
    }

    public function render()
    {
        return view('livewire.crud.migrantes.form.identificacion-step');
    }

    public function updatedIdentificacion($value)
    {
        session(['formMigranteData.migrante.identificacion' => $value]);
    }

    #[On('identificacion-error')]
    public function throwError()
    {
        throw ValidationException::withMessages([
            'identificacion' => ['* Debe completar este campo']
        ]);
    }
}
