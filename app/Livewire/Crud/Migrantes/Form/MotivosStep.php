<?php

namespace App\Livewire\Crud\Migrantes\Form;

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

        $this->motivosSelected = session('formMigranteData.expediente.motivosSelected', []);
        $this->necesidadesSelected = session('formMigranteData.expediente.necesidadesSelected', []);
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
        $validated = $this->validate([
            'motivosSelected' => 'array|min:1',
            'necesidadesSelected' => 'array|min:1',
        ]);
    }


    public function render()
    {
        return view('livewire.crud.migrantes.form.motivos-step');
    }
}
