<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Donante;
use App\Models\Donacion;
use Livewire\Component;

class InfoDonaciones extends Component
{
    public $item; 
    public $donantes; 
    public $idModal; 
    public function mount($parameters)
    {
        $this->item = $parameters['item']; 
        $this->idModal = $parameters['idModal']; 
        $this->donantes = Donante::all(); 
    }

    
    public function initForm()
    {
       
    }

    
    public function render()
    {
        return view('livewire.crud.donaciones.info-donaciones', [
            'item' => $this->item,
            'donantes' => $this->donantes,
        ]);
    }
}
