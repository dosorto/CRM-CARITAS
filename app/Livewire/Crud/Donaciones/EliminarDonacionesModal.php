<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Donacion;
use Livewire\Component;

class EliminarDonacionesModal extends Component
{
    public $item;    
    public $idModal;  

    
    public function deleteItem()
    {
        
        if ($this->item) {
            $this->item->delete();  
            $this->dispatch('cerrar-modal');  
            $this->dispatch('item-deleted');  
        }
    }

    
    public function mount($parameters)
    {
        $this->item = $parameters['item'];  
        $this->idModal = $parameters['idModal']; 
    }
    public function render()
    {
        return view('livewire.crud.donaciones.eliminar-donaciones-modal');
    }
}
