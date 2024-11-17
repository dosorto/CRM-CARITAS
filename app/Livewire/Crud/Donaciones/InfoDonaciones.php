<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Donante;
use App\Models\Donacion;
use Livewire\Component;

class InfoDonaciones extends Component
{
    public $item; // Donación seleccionada
    public $donantes; // Lista de donantes
    public $idModal; // ID del Modal

    // Método que se ejecuta al cargar el componente
    public function mount($parameters)
    {
        $this->item = $parameters['item']; // Donación a mostrar
        $this->idModal = $parameters['idModal']; // ID del Modal
        $this->donantes = Donante::all(); // Lista de donantes para mostrar su nombre, si es necesario
    }

    // Método para inicializar el formulario si es necesario
    public function initForm()
    {
        // Aquí puedes inicializar datos adicionales si los necesitas
    }

    // Método para renderizar la vista
    public function render()
    {
        return view('livewire.crud.donaciones.info-donaciones', [
            'item' => $this->item,
            'donantes' => $this->donantes,
        ]);
    }
}
