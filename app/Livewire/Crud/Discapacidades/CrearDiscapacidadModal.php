<?php

namespace App\Livewire\Crud\Discapacidades;
use App\Models\Discapacidad;
use App\Livewire\Components\ContentTable;

use Livewire\Component;

class CrearDiscapacidadModal extends Component
{
    /*
        -------------------------------------------
        Hay mas documentacion en EditarPaisModal Xd
        -------------------------------------------
    */

    public $Discapacidad;
    public $idModal;

    public function mount($idModal)
    {
        // Inicializa el identificador unico del modal
        // necesario debido a que hay varias instancias del mismo componente
        $this->idModal = $idModal;
    }

    public function render()
    {
        return view('livewire.crud.discapacidades.crear-discapacidad-modal');
    }

    public function create()
    {
        // Valida los datos de los inputs ingresados
        $validated = $this->validate([
            // 'wire:model de input' => 'validacion necesaria'
            'Discapacidad' => 'required',
        ]);

        // Logica para crear el pais, se usan los datos validados con $validated
        $discapacidad = new Discapacidad();
        $discapacidad->discapacidad = $validated['Discapacidad'];
        $discapacidad->save();

        // Se envía el evento de item-created a la tabla para que actualice su contenido.
        $this->dispatch('item-created')->to(ContentTable::class);

        // este evento se envia en este mismo componente y se escucha en la vista con un script, 
        // que cambia el valor del checkbox del modal a 'false', cerrándolo.
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->dispatch('close-modal')->self();
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->Discapacidad = '';
    }
}
