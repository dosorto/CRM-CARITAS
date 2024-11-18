<?php

namespace App\Livewire\Crud\Mobiliarios;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Mobiliario;


class InfoMobiliarioModal extends Component
{

    public $item;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function resetForm(){}

    #[On('update-info-modal')]
    public function udpateData($id)
    {
        // verifica si el id del item del modal es igual al id del item editado
        // para evitar que todos los modales de eliminar se actualicen con los datos del unico item editado.
        if ($this->item->id === $id) {
            $this->item = Mobiliario::find($id);
        }
    }

    public function render()
    {
        return view('livewire.crud.mobiliarios.info-mobiliario-modal');
    }
}
