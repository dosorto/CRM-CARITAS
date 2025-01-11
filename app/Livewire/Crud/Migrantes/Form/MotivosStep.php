<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use App\Models\MotivoSalidaPais;
use App\Models\Necesidad;
use Livewire\Attributes\On;
use Livewire\Component;

class MotivosStep extends Component
{
    public $motivosSelected = [];
    public $motivosSalidaPais;
    public $textoBusquedaMotivos = '';

    public $necesidades = [];
    public $necesidadesSelected = [];
    public $textoBusquedaNecesidades = '';

    public function mount()
    {
        $this->motivosSalidaPais = MotivoSalidaPais::orderBy('id', 'desc')->get();
        $this->necesidades = Necesidad::orderBy('id', 'desc')->get();

        $this->motivosSelected = session('formMigranteData.expediente.motivosSalidaPais', []);
        $this->necesidadesSelected = session('formMigranteData.expediente.necesidades', []);
    }

    public function updatedTextoBusquedaMotivos($value)
    {
        $query = MotivoSalidaPais::orderBy('id', 'desc');

        if (trim($value) !== '') {
            $query->where('motivo_salida_pais', 'LIKE', '%' . trim($value) . '%');
        }

        $this->motivosSalidaPais = $query->get();
    }

    public function updatedTextoBusquedaNecesidades($value)
    {
        $query = Necesidad::orderBy('id', 'desc');

        if (trim($value) !== '') {
            $query->where('necesidad', 'LIKE', '%' . trim($value) . '%');
        }

        $this->necesidades = $query->get();
    }

    #[On('validate-motivos')]
    public function validateMotivos()
    {
        $this->validate([
            'motivosSelected' => 'array|min:1',
            'necesidadesSelected' => 'array|min:1',
        ]);

        session()->put('formMigranteData.expediente.motivosSalidaPais', $this->motivosSelected);
        session()->put('formMigranteData.expediente.necesidades', $this->necesidadesSelected);

        $this->dispatch('motivos-validated')->to(RegistrarMigrante::class);
    }


    public function render()
    {
        return view('livewire.crud.migrantes.form.motivos-step');
    }
}
