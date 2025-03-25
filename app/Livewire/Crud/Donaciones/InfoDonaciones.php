<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Donante;
use Livewire\Component;

class InfoDonaciones extends Component
{
    public $item;
    public $donantes;
    public $idModal;
    protected $listeners = ['item-edited' => 'refreshItem'];

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->donantes = Donante::all();
    }

    // public function refreshItem()
    // {
    //     $this->item->refresh(); // Vuelve a cargar el modelo desde la BD
    // }

    public function refreshItem()
    {
        $this->item = $this->item->fresh([
            'donante',
            'articulos' => fn ($query) => $query->withPivot('cantidad_donada')
        ]);
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
