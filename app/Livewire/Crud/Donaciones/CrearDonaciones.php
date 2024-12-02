<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Articulo;
use App\Models\Donacion;
use App\Models\DonacionArticulo;
use App\Models\Donante;
use Carbon\Carbon;
use Livewire\Component;


class CrearDonaciones extends Component
{
    public $id_donante;
    public $fecha_donacion;
    public $cantidad = [];
    public $cantidadSeleccionada; // Cantidad del artículo seleccionado
    public $donantes;
    public $articulos;
    public $nombre_donante;
    public $idArticulo;
    public $codigo_barra;

    public function create()
    {
        $this->validate([
            'id_donante' => 'required|exists:donantes,id',
            'cantidad.*' => 'required|integer|min:1',
            'fecha_donacion' => 'required|date',
        ]);

        $donacion = Donacion::create([
            'id_donante' => $this->id_donante,
            'fecha_donacion' => $this->fecha_donacion,
        ]);

        foreach ($this->cantidad as $articuloId => $cantidad) {
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
        $this->resetForm();

        return $this->redirect(route('ver-donaciones'));
    }



    public function selectArticulo()
    {
        $this->validate([
            'codigo_barra' => 'required|string',
            'cantidadSeleccionada' => 'required|integer|min:1',
        ]);

        // Buscar el artículo por su nombre
        $articulo = Articulo::where('codigo_barra', $this->codigo_barra)->first();

        if (!$articulo) {
            return redirect(route('ver-articulos'));
        }

        // Añadir el artículo si no está ya seleccionado
        if (!array_key_exists($articulo->id, $this->cantidad)) {
            $this->cantidad[$articulo->id] = $this->cantidadSeleccionada;
        } else {
            $this->cantidad[$articulo->id] += $this->cantidadSeleccionada;
        }

        // Restablecer los campos de nombre y cantidad
        $this->codigo_barra = '';
        $this->cantidadSeleccionada = '';
    }



    public function resetArticuloInputs()
    {
        $this->cantidadSeleccionada = null;
        $this->dispatch('focus-codigo')->self();
    }

    public function resetForm()
    {
        $this->id_donante = null;
        $this->fecha_donacion = null;
        $this->cantidad = [];
        $this->cantidadSeleccionada = null;
    }

    public function mount()
    {
        $this->fecha_donacion = Carbon::now()->format('Y-m-d');
        $this->donantes = Donante::all();
        $this->articulos = Articulo::all();
    }

    public function updatedNombreDonante($nombre)
    {
        $donante = Donante::where('nombre_donante', $nombre)->first();
        if ($donante) {
            $this->id_donante = $donante->id;
        } else {
            $this->id_donante = null;
        }
    }

    public function removeArticulo($articuloId)
    {
        if (array_key_exists($articuloId, $this->cantidad)) {
            unset($this->cantidad[$articuloId]); // Elimina el artículo de la lista
        }
    }

    public function render()
    {
        return view('livewire.crud.donaciones.crear-donaciones');
    }
}

