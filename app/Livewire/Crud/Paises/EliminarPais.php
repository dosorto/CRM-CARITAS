<?php

namespace App\Livewire\Crud\Paises;
use LivewireUI\Modal\ModalComponent;
use App\Models\Pais;

class EliminarPais extends ModalComponent
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

    public function eliminar()
    {
        $pais = Pais::find($this->id);

        if ($pais) {
            $pais->delete();
        }

        $this->closeModal();
        $this->dispatch('pais-eliminado');

    }

    public function render()
    {
        return view('livewire.crud.paises.eliminar-pais')
            ->with('nombre_pais', $this->nombre_pais);
    }
}
