<?php

namespace App\Livewire\Crud\Donaciones;

use App\Livewire\Components\ContentTable;
use App\Models\Articulo;
use App\Models\Donante;
use App\Models\DonacionArticulo;
use Livewire\Component;

class EditarDonacionesModal extends Component
{
    public $item;
    public $articulosSeleccionados = [];
    public $fecha_donacion;
    public $id_donante;
    public $donantes;
    public $articulos;
    public $idModal;


    public function editItem()
    {
        $this->validate([
            'fecha_donacion' => 'required|date',
            'id_donante' => 'required|exists:donantes,id',
            'articulosSeleccionados' => 'required|array|min:1',
            'articulosSeleccionados.*.id_articulo' => 'required|integer|exists:articulos,id',
            'articulosSeleccionados.*.cantidad_donacion' => 'required|integer|min:1',
        ]);

        $this->item->update([
            'fecha_donacion' => $this->fecha_donacion,
            'id_donante' => $this->id_donante,
        ]);

        foreach ($this->articulosSeleccionados as $nuevo) {
            $idOriginal = $nuevo['id_articulo_original'];
            $idNuevo = $nuevo['id_articulo'];
            $cantidadNueva = $nuevo['cantidad_donacion'];

            $donacionArticulo = DonacionArticulo::where('id_donacion', $this->item->id)
                ->where('id_articulo', $idOriginal)
                ->first();

            if ($donacionArticulo) {
                if ($idOriginal == $idNuevo) {
                    // Solo cambia la cantidad
                    $diferencia = $cantidadNueva - $donacionArticulo->cantidad_donada;
                    $donacionArticulo->cantidad_donada = $cantidadNueva;
                    $donacionArticulo->save();

                    $modelo = Articulo::find($idNuevo);
                    if ($modelo) {
                        $modelo->cantidad_stock += $diferencia;
                        $modelo->save();
                    }
                } else {
                    // Cambió el artículo: actualizar sin crear uno nuevo

                    // Revertimos stock anterior
                    $modeloAnterior = Articulo::find($idOriginal);
                    if ($modeloAnterior) {
                        $modeloAnterior->cantidad_stock -= $donacionArticulo->cantidad_donada;
                        $modeloAnterior->save();
                    }

                    // Actualizamos el registro (sin eliminar ni crear otro)
                    $donacionArticulo->id_articulo = $idNuevo;
                    $donacionArticulo->cantidad_donada = $cantidadNueva;
                    $donacionArticulo->save();

                    // Ajustamos stock del nuevo
                    $modeloNuevo = Articulo::find($idNuevo);
                    if ($modeloNuevo) {
                        $modeloNuevo->cantidad_stock += $cantidadNueva;
                        $modeloNuevo->save();
                    }
                }
            }
        }


        $this->dispatch('cerrar-modal')->self();
        $this->dispatch('item-edited')->to(InfoDonaciones::class);
        $this->dispatch('item-edited')->to(ContentTable::class);
    }

    public function initForm()
    {
        $this->fecha_donacion = $this->item->fecha_donacion;
        $this->id_donante = $this->item->id_donante;

        $this->item->load('articulos');

        $this->articulosSeleccionados = $this->item->articulos->map(function ($articulo) {
            return [
                'id_articulo_original' => $articulo->id, // lo guardamos para poder compararlo después
                'id_articulo' => (int) $articulo->id,
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
        $this->item->load('articulos'); // ← esto asegura que venga con la relación
        $this->initForm();
    }

    public function render()
    {
        return view('livewire.crud.donaciones.editar-donaciones-modal');
    }
}


