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


        $this->closeModal();

        //Este evento se envia a la tabla de contenido para actualizarse
        $this->dispatch('item-created')->to(ContentTable::class);

        //Este evento se envia al modal de Crear Donante Modal para actualizar el select
        $this->dispatch('donaciones-created')->to(CrearDonacionesModal::class);
    }

    public function initForm()
    {
        $this->nombre_donante = '';
    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->tiposDonantes = TipoDonante::all();
        if ($this->tiposDonantes->isNotEmpty()) {
            $this->tipo_donante_id = $this->tiposDonantes[0]->id;
        }
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

    public function closeModal()
    {
        $this->initForm();
        $this->dispatch('cerrar-modal')->self();
    }
}
