<?php

namespace App\Livewire\Crud\Donantes;

use App\Livewire\Components\ContentTable;
use App\Livewire\Crud\Articulos\CrearArticuloModal;
use App\Livewire\Crud\Donaciones\CrearDonacionesModal;
use App\Models\Donante;
use App\Models\TipoDonante;
use Livewire\Component;
use Livewire\Attributes\On;

class CrearDonantesModal extends Component
{
    public $nombre_donante;
    public $tipo_donante_id;
    public $tiposDonantes;
    public $idModal;

    public function create()
    {
        $validated = $this->validate([
            'nombre_donante' => 'required|string|max:255',
            'tipo_donante_id' => 'required|exists:tipo_donante,id',
        ]);

        $nuevoDonante = new Donante();
        $nuevoDonante->nombre_donante = $validated['nombre_donante'];
        $nuevoDonante->tipo_donante_id = $validated['tipo_donante_id'];
        $nuevoDonante->save();

        //se despacha el evento a si mismo para cerrarsolo este modal
        $this->dispatch('cerrar-modal')->self();

        //Este evento se envia a la tabla de contenido para actualizarse
        $this->dispatch('item-created')->to(ContentTable::class);

        //Este evento se envia al modal de Crear Donante Modal para actualizar el select
        $this->dispatch('donaciones-created')->to(CrearDonacionesModal::class);


    }

    public function initForm()
    {
        $this->tiposDonantes = TipoDonante::all();
        $this->nombre_donante = '';
        $this->tipo_donante_id = null;

    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.donantes.crear-donantes-modal');
    }

    #[On('tipo-donante-created')]
    public function updateTipoDonanteSelect()
    {
        $this->tiposDonantes = TipoDonante::select('id', 'descripcion')
            ->orderBy('id', 'desc')
            ->get();
    }
}


