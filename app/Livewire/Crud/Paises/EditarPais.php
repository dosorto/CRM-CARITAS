<?php

namespace App\Livewire\Crud\Paises;

use LivewireUI\Modal\ModalComponent;
use App\Models\Pais;

class EditarPais extends ModalComponent
{
    public $id;
    public $nombre_pais;
    public $codigo_alfa3;
    public $codigo_numerico;

    public function mount($id)
    {
        $pais = Pais::find($id);
        $this->id = $id;
        $this->nombre_pais = $pais->nombre_pais;
        $this->codigo_alfa3 = $pais->codigo_alfa3;
        $this->codigo_numerico = $pais->codigo_numerico;
    }

    public function editar()
    {
        $nuevo_pais = Pais::find($this->id);

        $nuevo_pais->nombre_pais = $this->nombre_pais;
        $nuevo_pais->codigo_alfa3 = $this->codigo_alfa3;
        $nuevo_pais->codigo_numerico = $this->codigo_numerico;

        $nuevo_pais->save();

        $this->dispatch('pais-editado', id: $nuevo_pais->id);

        $this->closeModal();

    }

    public function render()
    {
        return view('livewire.crud.paises.editar-pais');
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;   
    }
}
