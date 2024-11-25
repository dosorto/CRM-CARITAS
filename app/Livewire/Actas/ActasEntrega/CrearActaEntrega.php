<?php

namespace App\Livewire\Actas\ActasEntrega;

use App\Models\ActaEntrega;
use App\Models\Articulo;
use App\Models\DetalleActaEntrega;
use App\Models\Migrante;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Illuminate\Support\Carbon;

class CrearActaEntrega extends Component
{
    // lista de migrantes para seleccionar en el acta
    public $migrantes = [];
    // almacena el número de la identificación seleccionada
    public $identificacion;

    // lista que contiene la lista de artículos y sus cantidades a entregar.
    public $listaEntrega = [
        'articulos' => [],
        'cantidades' => []
    ];

    // todos los artículos cargados para seleccionar manualmente
    public $dataArticulos = [];

    // input de código
    public $codigo;

    // input cantidad por defecto en 1 para optimizar proceso con lectora de codigo
    public $cantidad = 1;



    public function mount()
    {
        // pre-cargar la lista de migrantes
        $this->migrantes = Migrante::select('id', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'numero_identificacion', 'pais_id')
            ->with('pais')
            ->get();

        // pre-cargar la lista entera de articulos
        $this->dataArticulos = Articulo::select('id', 'codigo_barra', 'nombre', 'cantidad_stock')->get();
    }

    public function render()
    {
        return view('livewire.actas.actas-entrega.crear-acta-entrega');
    }


    public function generarActaEntrega()
    {
        $migrante = Migrante::select('id', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'numero_identificacion')
            ->firstWhere('numero_identificacion', $this->identificacion);

        if (!$migrante) {
            throw ValidationException::withMessages([
                'identificacion' => ['* Seleccione un destinatario válido']
            ]);
        }

        // se guarda en la sesión los datos para recogerlos posteriormente en la vista del acta generada
        session([
            'migrante' => $migrante,
            'articulos' => $this->listaEntrega['articulos'],
            'cantidades' => $this->listaEntrega['cantidades'],
            'fecha' => Carbon::now()->format('Y-m-d'),
        ]);

        $this->guardarActa(
            $migrante->id,
            $this->listaEntrega['articulos'],
            $this->listaEntrega['cantidades']
        );


        return redirect()->route('info-acta-entrega');
    }

    // funcion para seleccionar artículo ingresado
    public function selectArticulo()
    {
        // valida los campos, que ambos estén llenos
        $validated = $this->validate([
            'codigo' => 'required',
            'cantidad' => 'required',
        ]);

        // Primero se recorre la lista temporal (listaEntrega)
        // para verificar que el articulo no se ha ingresado antes
        for ($i = 0; $i < sizeof($this->listaEntrega['articulos']); $i++) {

            // se verifica si el codigo de los articulos de la lista de entrega coincide con el ingresado
            if ($this->listaEntrega['articulos'][$i]->codigo_barra === $validated['codigo']) {

                // Se validan las cantidades, en caso de que se hayan ingresado más de las disponibles,
                // lanzará un error mostrándolo en pantalla junto con la cantidad máxima disponible.
                $this->validarCantidad($i, $validated['cantidad']);

                // Si pasó las validaciones de arriba, entonces significa que el articulo ya se ingresó
                // y que la cantidad ingresada está disponible.
                // por lo que se suma la cantidad ingresada (int)$validated['cantidad'] a la cantidad de la lista temporal.
                $this->listaEntrega['cantidades'][$i] += (int)$validated['cantidad'];

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
            $this->listaEntrega['articulos'][] = $articulo;
            // Y se agrega la cantidad, a la lista de cantidades a entregar.
            $this->listaEntrega['cantidades'][] = (int)$validated['cantidad'];
            $this->resetForm();
            return;
        }

        // Si el artículo no se encontró por ningún lado, entonces se envía un evento a este mismo componente
        // que abre el modal de confirmación para crear uno nuevo (pendiente)
        $this->dispatch('open-create-modal')->self();
    }

    public function validarCantidad($i, $cantidadValidada)
    {
        $cantTotal = $this->listaEntrega['cantidades'][$i] + $cantidadValidada;
        $cantStock = $this->listaEntrega['articulos'][$i]->cantidad_stock;
        $cantDisponible = $cantStock - $this->listaEntrega['cantidades'][$i];

        if ($cantTotal > $cantStock) {
            throw ValidationException::withMessages([
                'cantidad' => ['Máximo: ' . $cantDisponible]
            ]);
        }
    }


    public function resetForm()
    {
        $this->cantidad = 1;
        $this->codigo = '';
        // Evento para establecer que el cursor se coloque en el campo "codigo"
        $this->dispatch('focus-codigo')->self();
    }

    public function guardarActa($idMigrante, $articulos, $cantidadesEntregadas)
    {
        // Se guarda el acta, solo necesita el migrante_id
        $newActa = new ActaEntrega();
        $newActa->migrante_id = $idMigrante;
        $newActa->save();

        // extraemos el último id del acta generada, debido a que lo necesitaremos
        // para ingresar los detalles del acta.
        $idNewActa = ActaEntrega::max('id');

        // Iteramos por los artículos ingresados, para ir cambiando el stock, y guardando su detalle de actaEntrega
        for ($i = 0; $i < sizeof($articulos); $i++) {
            // Guardar el detalle de acta.
            $detalleActa = new DetalleActaEntrega();
            $detalleActa->acta_entrega_id = $idNewActa;
            $detalleActa->articulo_id = $articulos[$i]->id;
            $detalleActa->cantidad = $cantidadesEntregadas[$i];
            $detalleActa->save();

            // Editar Stock de articulo
            $art = Articulo::where('codigo_barra', $articulos[$i]->codigo_barra)->first();
            if ($art) {
                $art->cantidad_stock -= $cantidadesEntregadas[$i]; // Asigna el nuevo valor de stock
                $art->save(); // Guarda el cambio en la base de datos
            }
        }
    }

    public function cancelarArticulo($i)
    {
        unset($this->listaEntrega['articulos'][$i]);
        unset($this->listaEntrega['cantidades'][$i]);

        // Reindexar los arrays para evitar huecos en los índices
        $this->listaEntrega['articulos'] = array_values($this->listaEntrega['articulos']);
        $this->listaEntrega['cantidades'] = array_values($this->listaEntrega['cantidades']);
    }
}
