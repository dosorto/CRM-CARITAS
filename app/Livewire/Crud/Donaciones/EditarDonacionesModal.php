<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Articulo;
use App\Models\Donante;
use App\Models\Donacion;
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
        $validated = $this->validate([
            'fecha_donacion' => 'required|date',
            'id_donante' => 'required|exists:donantes,id',
            'articulosSeleccionados' => 'required|array|min:1',
            'articulosSeleccionados.*.id_articulo' => 'required|exists:articulos,id',
            'articulosSeleccionados.*.cantidad_donacion' => 'required|integer|min:1',
        ]);

       
        $this->item->update([
            'fecha_donacion' => $this->fecha_donacion,
            'id_donante' => $this->id_donante,
        ]);

        foreach ($this->articulosSeleccionados as $articulo) {
            $donacionArticulo = DonacionArticulo::where('id_donacion', $this->item->id)
                ->where('id_articulo', $articulo['id_articulo'])
                ->first();

            
            if ($donacionArticulo) {
               
                $cantidadAnterior = $donacionArticulo->cantidad_donada;

               
                $diferencia = $articulo['cantidad_donacion'] - $cantidadAnterior;

               
                $donacionArticulo->cantidad_donada = $articulo['cantidad_donacion'];
                $donacionArticulo->save();

                
                $articuloModelo = Articulo::find($articulo['id_articulo']);
                if ($articuloModelo) {
                   
                    $articuloModelo->cantidad_stock += $diferencia;
                    $articuloModelo->save();
                }
            }
        }

        // Emitir eventos para cerrar el modal y notificar que la donación ha sido editada
        $this->dispatch('cerrar-modal');
        $this->dispatch('item-edited');
    }


    
    public function initForm()
    {
        $this->fecha_donacion = $this->item->fecha_donacion;
        $this->id_donante = $this->item->id_donante;

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


