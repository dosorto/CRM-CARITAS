<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Articulo;
use App\Models\Donante;
use App\Models\Donacion;
use Livewire\Component;

class CrearDonacionesModal extends Component
{
    public $id_donante;
    public $fecha_donacion;
    public $selectedArticulos = [];  // Artículos seleccionados
    public $cantidad = [];  // Cantidades de los artículos seleccionados
    public $donantes;
    public $articulos;
    public $idModal;

    // Método para crear la donación
    public function create()
    {
        // Validación de los campos
        $validated = $this->validate([
            'id_donante' => 'required|exists:donantes,id',  // Asegurarse de que el donante exista
            'selectedArticulos' => 'required|array|min:1',  // Asegurarse de que se seleccionen artículos
            'cantidad.*' => 'required|integer|min:1',  // Asegurarse de que cada cantidad sea válida
            'fecha_donacion' => 'required|date',  // Validar la fecha
        ]);

        // Crear una donación por cada artículo seleccionado
        foreach ($this->selectedArticulos as $articuloId) {
            // Verificar que la cantidad existe para este artículo antes de intentar crear la donación
            if (isset($this->cantidad[$articuloId]) && $this->cantidad[$articuloId] > 0) {
                Donacion::create([
                    'id_donante' => $this->id_donante,
                    'id_articulo' => $articuloId,
                    'cantidad_donacion' => $this->cantidad[$articuloId],  // Usar la cantidad de cada artículo
                    'fecha_donacion' => $this->fecha_donacion,
                ]);
            }
        }

        // Emitir eventos para cerrar el modal y notificar la creación
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-created');
    }

    // Método para inicializar los datos del formulario
    public function initForm()
    {
        $this->donantes = Donante::all();  // Obtener todos los donantes
        $this->articulos = Articulo::all(); // Obtener todos los artículos
        $this->id_donante = null;
        $this->fecha_donacion = null;
        $this->selectedArticulos = [];  // Resetear los artículos seleccionados
        $this->cantidad = [];  // Resetear las cantidades
    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.donaciones.crear-donaciones-modal');
    }
}
