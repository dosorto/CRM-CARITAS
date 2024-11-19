<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Articulo;
use App\Models\Donante;
use App\Models\Donacion;
use App\Models\DonacionArticulo;
use Livewire\Component;

class CrearDonacionesModal extends Component
{
    public $id_donante;
    public $fecha_donacion;
    public $selectedArticulos = [];
    public $cantidad = [];
    public $donantes;
    public $articulos;
    public $idModal;


    public function create()
    {

        $validated = $this->validate([
            'id_donante' => 'required|exists:donantes,id',
            'selectedArticulos' => 'required|array|min:1',
            'cantidad.*' => 'required|integer|min:1',
            'fecha_donacion' => 'required|date',
        ]);


        $donacion = Donacion::create([
            'id_donante' => $this->id_donante,
            'fecha_donacion' => $this->fecha_donacion,
        ]);


        foreach ($this->selectedArticulos as $articuloId) {

            if (isset($this->cantidad[$articuloId]) && $this->cantidad[$articuloId] > 0) {

                DonacionArticulo::create([
                    'id_donacion' => $donacion->id,
                    'id_articulo' => $articuloId,
                    'cantidad_donada' => $this->cantidad[$articuloId],
                ]);


                $articulo = Articulo::find($articuloId);
                if ($articulo) {
                    $articulo->cantidad_stock += $this->cantidad[$articuloId];
                    $articulo->save();
                }
            }
        }



        $this->dispatch('item-created');
    }


    public function initForm()
    {
        $this->donantes = Donante::all();
        $this->articulos = Articulo::all();
        $this->id_donante = null;
        $this->fecha_donacion = null;
        $this->selectedArticulos = [];
        $this->cantidad = [];
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
