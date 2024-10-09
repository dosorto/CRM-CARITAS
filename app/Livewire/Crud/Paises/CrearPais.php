<?php

namespace App\Livewire\Crud\Paises;

use App\Models\Pais;
use LivewireUI\Modal\ModalComponent;

class CrearPais extends ModalComponent
{
    public $nombre_pais;
    public $codigo_alfa3;
    public $codigo_numerico;

    public function crear()
    {
        $nuevo_pais = New Pais;

        $nuevo_pais->nombre_pais = $this->nombre_pais;
        $nuevo_pais->codigo_alfa3 = $this->codigo_alfa3;
        $nuevo_pais->codigo_numerico = $this->codigo_numerico;

        $nuevo_pais->save();

        $this->dispatch('pais-creado');

        $this->closeModal();

    }

    public function render()
    {
        return view('livewire.crud.paises.crear-pais');
    }
}
