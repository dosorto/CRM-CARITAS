<?php

namespace App\Livewire\Crud\Migrantes\Form;

use Livewire\Component;
use App\Models\Discapacidad;
use Illuminate\Support\Str;

class DiscapacidadesStep extends Component
{
    public $discapacidades;
    public $discapacidadesSelected = [];

    public $textoBusquedaDiscapacidades = '';
    public $observacion;

    public function mount()
    {
        $this->discapacidades = Discapacidad::all();
        $this->discapacidadesSelected = session()->get('formMigranteData.expediente.discapacidades', []);

        $this->observacion = session()->get('formMigranteData.expediente.observacion', '');
    }

    public function updatedTextoBusquedaDiscapacidades($value)
    {
        $query = Discapacidad::orderBy('id', 'desc');

        if (trim($value) !== '') {
            $query->where('discapacidad', 'LIKE', '%' . trim($value) . '%');
        }

        $this->discapacidades = $query->get();
    }

    public function updated($field)
    {
        if (Str::beforeLast($field, '.') === 'discapacidadesSelected') {
            session()->put('formMigranteData.expediente.discapacidades', $this->discapacidadesSelected);
        } else if ($field === 'observacion') {
            session()->put('formMigranteData.expediente.observacion', $this->observacion);
        }
    }

    public function render()
    {
        return view('livewire.crud.migrantes.form.discapacidades-step');
    }
}
