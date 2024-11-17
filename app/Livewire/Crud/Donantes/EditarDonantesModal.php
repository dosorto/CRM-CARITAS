<?php

namespace App\Livewire\Crud\Donantes;

use App\Models\Donante;
use App\Models\TipoDonante;
use Livewire\Component;

class EditarDonantesModal extends Component
{
    public $nombre_donante;
    public $tipo_donante_id;
    public $tipos_donante;
    public $idModal;
    public $item;

    /**
     * Método para guardar los cambios del donante.
     */
    public function editItem()
    {
        $validated = $this->validate([
            'nombre_donante' => 'required|string|max:255',
            'tipo_donante_id' => 'required|exists:tipo_donante,id',
        ]);

        $this->item->nombre_donante = $validated['nombre_donante'];
        $this->item->tipo_donante_id = $validated['tipo_donante_id'];
        $this->item->save();

        // Emitir eventos para cerrar el modal y notificar la edición
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }

    /**
     * Método para inicializar el formulario con los datos del donante.
     */
    public function initForm()
    {
        $this->nombre_donante = $this->item->nombre_donante;
        $this->tipo_donante_id = $this->item->tipo_donante_id;
        $this->tipos_donante = TipoDonante::all();
    }

    /**
     * Método que se ejecuta al montar el componente.
     */
    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->initForm();
    }

    /**
     * Renderiza la vista del componente.
     */
    public function render()
    {
        return view('livewire.crud.donantes.editar-donantes-modal');
    }
}
