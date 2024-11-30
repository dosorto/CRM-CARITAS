<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Articulo;
use App\Models\Donacion;
use App\Models\DonacionArticulo;
use App\Models\Donante;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;


class CrearDonaciones extends Component
{
    public $id_donante;
    public $fecha_donacion;
    public $selectedArticulos = [];
    public $cantidad = [];
    public $codigo; // Código del artículo seleccionado
    public $cantidadSeleccionada; // Cantidad del artículo seleccionado
    public $donantes;
    public $articulos;
    public $nombre_donante;
    public $idArticulo;
    public $nombre_articulo;

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

        // foreach ($this->selectedArticulos as $articuloId) {
        //     if (isset($this->cantidad[$articuloId]) && $this->cantidad[$articuloId] > 0) {
        //         DonacionArticulo::create([
        //             'id_donacion' => $donacion->id,
        //             'id_articulo' => $articuloId,
        //             'cantidad_donada' => $this->cantidad[$articuloId],
        //         ]);

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
        $this->resetForm(); // Resetea los datos del formulario
        //$this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Donación registrada exitosamente.']);

    }



    public function selectArticulo()
    {
        $this->validate([
            'nombre_articulo' => 'required|string',
            'cantidadSeleccionada' => 'required|integer|min:1',
        ]);

        // Buscar el artículo por su nombre
        $articulo = Articulo::where('nombre', $this->nombre_articulo)->first();

        if (!$articulo) {
            $this->addError('nombre_articulo', 'El artículo no existe.');
            return;
        }

        // Añadir el artículo si no está ya seleccionado
        if (!in_array($articulo->id, $this->selectedArticulos)) {
            $this->selectedArticulos[] = $articulo->id;
            $this->cantidad[$articulo->id] = $this->cantidadSeleccionada;
        }

        // Restablecer los campos de nombre y cantidad
        $this->nombre_articulo = '';
        $this->cantidadSeleccionada = '';
    }



    public function resetArticuloInputs()
    {
        $this->codigo = null;
        $this->cantidadSeleccionada = null;
        $this->dispatch('focus-codigo')->self();
    }

    public function resetForm()
    {
        $this->id_donante = null;
        $this->fecha_donacion = null;
        $this->selectedArticulos = [];
        $this->cantidad = [];
        $this->codigo = null;
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
        unset($this->selectedArticulos['articulos'][$articuloId]);
        unset($this->selectedArticulos['cantidades'][$articuloId]);

        // Reindexar los arrays para evitar huecos en los índices
        $this->selectedArticulos['articulos'] = array_values($this->selectedArticulos['articulos']);
        $this->selectedArticulos['cantidades'] = array_values($this->selectedArticulos['cantidades']);
    }



    public function render()
    {
        return view('livewire.crud.donaciones.crear-donaciones');
    }
}
