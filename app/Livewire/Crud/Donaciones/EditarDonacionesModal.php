<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Articulo;
use App\Models\Donante;
use Livewire\Component;

class EditarDonacionesModal extends Component
{
    public $item;  // Donación a editar
    public $cantidad_donacion;
    public $fecha_donacion;
    public $donante_id;
    public $articulo_id;
    public $donantes;
    public $articulos;
    public $idModal;

    public function editItem()
    {
        // Validación de los datos
        $validated = $this->validate([
            'cantidad_donacion' => 'required|integer|min:1',
            'fecha_donacion' => 'required|date',
            'donante_id' => 'required|exists:donantes,id',
            'articulo_id' => 'required|exists:articulos,id',
        ]);

        // Actualizar la donación
        $donacionEdited = $this->item;
        $donacionEdited->cantidad_donacion = $validated['cantidad_donacion'];
        $donacionEdited->fecha_donacion = $validated['fecha_donacion'];
        $donacionEdited->donante_id = $validated['donante_id'];
        $donacionEdited->articulo_id = $validated['articulo_id'];

        $donacionEdited->save();

        // Emitir eventos para cerrar el modal y notificar que la donación ha sido editada
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }

    public function initForm()
    {
        // Inicializar los valores del formulario con los datos actuales de la donación
        $this->cantidad_donacion = $this->item->cantidad_donacion;
        $this->fecha_donacion = $this->item->fecha_donacion;
        $this->donante_id = $this->item->donante_id;
        $this->articulo_id = $this->item->articulo_id;

        // Obtener las listas de donantes y artículos para los selectores
        $this->donantes = Donante::all();
        $this->articulos = Articulo::all();
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];  // Obtener la donación que se va a editar
        $this->idModal = $parameters['idModal'];  // Identificador del modal
        $this->initForm();  // Inicializar los datos del formulario
    }

    public function render()
    {
        return view('livewire.crud.donaciones.editar-donaciones-modal');
    }
}
