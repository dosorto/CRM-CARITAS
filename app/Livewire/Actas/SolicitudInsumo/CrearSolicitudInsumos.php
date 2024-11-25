<?php

namespace App\Livewire\Actas\SolicitudInsumo;

use App\Models\Articulo;
use App\Models\DetalleSolicitudInsumos;
use App\Models\SolicitudInsumos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;

#[Lazy()]
class CrearSolicitudInsumos extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public $insumos = [];
    public $codigo;
    public $cantidad;
    public $insumosSeleccionados = [
        'articulos' => [],
        'cantidades' => []
    ];

    public function mount()
    {
        // Por defecto, se traen solo los que son insumos.
        $this->insumos = Articulo::select('id', 'nombre', 'codigo_barra', 'cantidad_stock', 'es_insumo')
            ->where('es_insumo', true)
            ->get();
    }

    // funcion para seleccionar artículo ingresado
    public function selectArticulo()
    {
        // valida los campos, que ambos estén llenos
        $validated = $this->validate([
            'codigo' => 'required',
            'cantidad' => 'required',
        ]);

        // Primero se recorre la lista temporal (insumosSeleccionados)
        // para verificar que el articulo no se ha ingresado antes
        for ($i = 0; $i < sizeof($this->insumosSeleccionados['articulos']); $i++) {

            // se verifica si el codigo de los articulos de la lista de entrega coincide con el ingresado
            if ($this->insumosSeleccionados['articulos'][$i]->codigo_barra === $validated['codigo']) {

                // Se validan las cantidades, en caso de que se hayan ingresado más de las disponibles,
                // lanzará un error mostrándolo en pantalla junto con la cantidad máxima disponible.
                $this->validarCantidad($i, $validated['cantidad']);

                // Si pasó las validaciones de arriba, entonces significa que el articulo ya se ingresó
                // y que la cantidad ingresada está disponible.
                // por lo que se suma la cantidad ingresada (int)$validated['cantidad'] a la cantidad de la lista temporal.
                $this->insumosSeleccionados['cantidades'][$i] += (int)$validated['cantidad'];

                // Se resetea el formulario para que al ingresarlo con éxito, vuelva a estar vacío
                // y con el cursor en el código listo para escanear uno nuevo con la lectora.
                $this->resetForm();

                return; // Se mata la función
            }
        }

        // Por otro lado, si el artículo no existe en la lista temporal actual, 
        // entonces se intenta extraer de la base de datos.
        $articulo = Articulo::select('id', 'codigo_barra', 'nombre', 'cantidad_stock')
            ->firstWhere('codigo_barra', $validated['codigo']);



        // Si se encuentra el artículo con el código ingresado, se procede con las demás validaciones
        if ($articulo) {

            // Se verifica, si la cantidad en stock es menor a la cantidad ingresada en el formulario,
            // Se arroja un error de validacion con mensaje, al campo 'cantidad'
            if ($articulo->cantidad_stock < $this->cantidad) {
                throw ValidationException::withMessages([
                    'cantidad' => ['Máximo: ' . $articulo->cantidad_stock]
                ]);
            }


            // Si no se lanzó ningún error, entonces se agrega el artículo a la lista de artículos
            $this->insumosSeleccionados['articulos'][] = $articulo;
            // Y se agrega la cantidad, a la lista de cantidades a entregar.
            $this->insumosSeleccionados['cantidades'][] = (int)$validated['cantidad'];
            $this->resetForm();
            return;
        }

        // Si el artículo no se encontró por ningún lado, entonces se envía un evento a este mismo componente
        // que abre el modal de confirmación para crear uno nuevo (pendiente)
        $this->dispatch('open-create-modal')->self();
    }


    public function generarSolicitud()
    {
        $this->guardarSolicitud(
            Auth::user()->id,
            $this->insumosSeleccionados['articulos'],
            $this->insumosSeleccionados['cantidades']
        );

        // se guarda en la sesión los datos para recogerlos posteriormente en la vista del acta generada
        session([
            'articulos' => $this->insumosSeleccionados['articulos'],
            'cantidades' => $this->insumosSeleccionados['cantidades'],
            'fecha' => Carbon::now()->format('Y-m-d'),
        ]);

        return redirect()->route('info-solicitud-insumos');
    }

    public function guardarSolicitud($userId, $articulos, $cantidades)
    {
        $solicitud = new SolicitudInsumos();
        $solicitud->user_id = $userId;
        $solicitud->fecha = Carbon::now()->format('Y-m-d');
        $solicitud->save();

        $idNuevaSolicitud = $solicitud->id;

        // Iteramos por los artículos ingresados, para ir cambiando el stock, y guardando su detalle de actaEntrega
        for ($i = 0; $i < sizeof($articulos); $i++) {
            // Guardar el detalle de acta.
            $detalle = new DetalleSolicitudInsumos();
            $detalle->solicitud_insumos_id = $idNuevaSolicitud;
            $detalle->articulo_id = $articulos[$i]->id;
            $detalle->cantidad = $cantidades[$i];
            $detalle->save();

            // Editar Stock de articulo
            $art = Articulo::where('codigo_barra', $articulos[$i]->codigo_barra)->first();
            if ($art) {
                $art->cantidad_stock -= $cantidades[$i]; // Asigna el nuevo valor de stock
                $art->save(); // Guarda el cambio en la base de datos
            }
        }

        return $idNuevaSolicitud;
    }

    public function resetForm()
    {
        $this->cantidad = 1;
        $this->codigo = '';
        // Evento para establecer que el cursor se coloque en el campo "codigo"
        $this->dispatch('focus-codigo')->self();
    }

    public function validarCantidad($i, $cantidadValidada)
    {
        $cantTotal = $this->insumosSeleccionados['cantidades'][$i] + $cantidadValidada;
        $cantStock = $this->insumosSeleccionados['articulos'][$i]->cantidad_stock;
        $cantDisponible = $cantStock - $this->insumosSeleccionados['cantidades'][$i];

        if ($cantTotal > $cantStock) {
            throw ValidationException::withMessages([
                'cantidad' => ['Máximo: ' . $cantDisponible]
            ]);
        }
    }

    public function cancelarArticulo($i)
    {
        unset($this->insumosSeleccionados['articulos'][$i]);
        unset($this->insumosSeleccionados['cantidades'][$i]);

        // Reindexar los arrays para evitar huecos en los índices
        $this->insumosSeleccionados['articulos'] = array_values($this->insumosSeleccionados['articulos']);
        $this->insumosSeleccionados['cantidades'] = array_values($this->insumosSeleccionados['cantidades']);
    }

    public function render()
    {
        return view('livewire.actas.solicitud-insumo.crear-solicitud-insumos');
    }
}