<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Articulo;
use App\Models\Donante;
use App\Models\Donacion;
use App\Models\DonacionArticulo;
use Livewire\Component;

class EditarDonacionesModal extends Component
{
    public $item; // Donación a editar
    public $articulosSeleccionados = []; // Artículos seleccionados para editar
    public $fecha_donacion;
    public $id_donante;
    public $donantes;
    public $articulos;
    public $idModal;

    // Método para editar la donación
   // Método para editar la donación
    public function editItem()
    {
        $validated = $this->validate([
            'fecha_donacion' => 'required|date',
            'id_donante' => 'required|exists:donantes,id',
            'articulosSeleccionados' => 'required|array|min:1',
            'articulosSeleccionados.*.id_articulo' => 'required|exists:articulos,id',
            'articulosSeleccionados.*.cantidad_donacion' => 'required|integer|min:1',
        ]);

        // Actualizar la donación
        $this->item->update([
            'fecha_donacion' => $this->fecha_donacion,
            'id_donante' => $this->id_donante,
        ]);

        // Actualizar los artículos relacionados y ajustar el stock
        foreach ($this->articulosSeleccionados as $articulo) {
            $donacionArticulo = DonacionArticulo::where('id_donacion', $this->item->id)
                ->where('id_articulo', $articulo['id_articulo'])
                ->first();

            // Si el artículo ya está relacionado con la donación, actualizamos la cantidad
            if ($donacionArticulo) {
                // Obtener la cantidad anterior donada
                $cantidadAnterior = $donacionArticulo->cantidad_donada;

                // Calcular la diferencia de cantidad
                $diferencia = $articulo['cantidad_donacion'] - $cantidadAnterior;

                // Actualizar la cantidad donada en la tabla intermedia
                $donacionArticulo->cantidad_donada = $articulo['cantidad_donacion'];
                $donacionArticulo->save();

                // Obtener el artículo y ajustar el stock
                $articuloModelo = Articulo::find($articulo['id_articulo']);
                if ($articuloModelo) {
                    // Ajustar el stock: si la diferencia es positiva, se suma; si es negativa, se resta
                    $articuloModelo->cantidad_stock += $diferencia;
                    $articuloModelo->save();
                }
            }
        }

        // Emitir eventos para cerrar el modal y notificar que la donación ha sido editada
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }


    // Inicializar el formulario con los datos de la donación
    public function initForm()
    {
        $this->fecha_donacion = $this->item->fecha_donacion;
        $this->id_donante = $this->item->id_donante;

        // Prepara los artículos seleccionados con sus cantidades
        $this->articulosSeleccionados = $this->item->articulos->map(function ($articulo) {
            return [
                'id_articulo' => $articulo->id,
                'cantidad_donacion' => $articulo->pivot->cantidad_donada,
            ];
        })->toArray();
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->donantes = Donante::all();
        $this->articulos = Articulo::all();
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.donaciones.editar-donaciones-modal');
    }
}


