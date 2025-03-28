<?php

namespace App\Livewire\Crud\Articulos;

use App\Models\Articulo;
use Livewire\Attributes\On;
use Livewire\Component;

class InfoArticulosModal extends Component
{
    public $item;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->initForm();
    }

    public function initForm(){}

    #[On('update-delete-modal')]
    public function udpateData($id)
    {
        // verifica si el id del item del modal es igual al id del item editado
        // para evitar que todos los modales de eliminar se actualicen con los datos del unico item editado.
        if ($this->item->id === $id)
        {
            $this->item = Articulo::find($id);
        }
    }



    public function render()
    {
        return view('livewire.crud.articulos.info-articulos-modal');
    }
}
