<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Articulo;
use App\Models\Donante;
use App\Models\Donacion;
use App\Models\DonacionArticulo;  // Importa el modelo de la tabla intermedia
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

        // Crear el registro de la donación
        $donacion = Donacion::create([
            'id_donante' => $this->id_donante,
            'fecha_donacion' => $this->fecha_donacion,
        ]);

        // Guardar las relaciones de los artículos donados
        foreach ($this->selectedArticulos as $articuloId) {
            // Verificar que la cantidad existe para este artículo antes de intentar crear la relación
            if (isset($this->cantidad[$articuloId]) && $this->cantidad[$articuloId] > 0) {
                // Crear la relación en la tabla intermedia donacion_articulo
                DonacionArticulo::create([
                    'id_donacion' => $donacion->id,
                    'id_articulo' => $articuloId,
                    'cantidad_donada' => $this->cantidad[$articuloId],  // Usar la cantidad de cada artículo
                ]);

                // Actualizar el stock del artículo sumando la cantidad donada
                $articulo = Articulo::find($articuloId);
                if ($articulo) {
                    $articulo->cantidad_stock += $this->cantidad[$articuloId];  // Sumar la cantidad donada al stock
                    $articulo->save();
                }
            }
        }

        // Emitir eventos para cerrar el modal y notificar la creación
       
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
