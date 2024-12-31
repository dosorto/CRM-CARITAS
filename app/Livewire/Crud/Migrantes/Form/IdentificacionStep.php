<?php

namespace App\Livewire\Crud\Migrantes\Form;

use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use Livewire\Attributes\On;
use Livewire\Component;

class IdentificacionStep extends Component
{
    public $identificacion;
    public $tipoIdentificacion;

    public function mount()
    {
        $this->identificacion = session()->get('formMigranteData.migrante.identificacion', '');
        $this->tipoIdentificacion = session()->get('formMigranteData.migrante.tipoIdentificacion', '');
    }

    public function render()
    {
        return view('livewire.crud.migrantes.form.identificacion-step');
    }

    #[On('validate-identificacion')]
    public function validateIdentificacion()
    {
        // Se validan los campos cuando se recibe el evento de RegistrarMigrante::class
        $this->validate([
            'identificacion' => 'required',
            'tipoIdentificacion' => 'required',
        ]);

        // Hasta que fueron validados se guardan en la variable de session
        session([
            'formMigranteData.migrante.identificacion' => $this->identificacion,
            'formMigranteData.migrante.tipoIdentificacion' => $this->tipoIdentificacion,
        ]);

        // Se manda el evento para avisar que los datos fueron validados y guardados en session
        $this->dispatch('identificacion-validated')->to(RegistrarMigrante::class);
    }
}
