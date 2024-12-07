<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\SolicitudTraslado;
use App\Models\SolicitudInsumos;
use Livewire\Attributes\Lazy;


#[Lazy()]
class VerSolicitudesPendientes extends Component
{

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public $solicitudesPendientes;

    public function mount()
    {
        $traslados = SolicitudTraslado::where('firmado', false)
            ->get()
            ->map(function ($solicitud) {
                // Convertir a objeto stdClass para poder acceder a propiedades
                $item = new \stdClass();
                $item->id = $solicitud->id;
                $item->tipo = 'traslado';
                $item->created_at = $solicitud->created_at;
                // Agrega otros campos que necesites
                return $item;
            });

        

        $insumos = SolicitudInsumos::where('firmado', false)
            ->get()
            ->map(function ($solicitud) {
                // Convertir a objeto stdClass
                $item = new \stdClass();
                $item->id = $solicitud->id;
                $item->tipo = 'insumo';
                $item->created_at = $solicitud->created_at;
                // Agrega otros campos que necesites
                return $item;
            });

        $this->solicitudesPendientes = $traslados->merge($insumos);
    }

    public function aprobarSolicitud($id, $tipo)
    {
        // Aprobar según el tipo de solicitud
        if ($tipo === 'traslado') {
            $solicitud = SolicitudTraslado::findOrFail($id);
        } else {
            $solicitud = SolicitudInsumos::findOrFail($id);
        }

        $solicitud->firmado = true;
        $solicitud->save();

        // Actualizar las solicitudes pendientes
        $this->mount();
    }

    public function redirigirDetalles($id, $tipo)
    {
        // Redirigir a la vista correspondiente según el tipo de solicitud
        if ($tipo === 'traslado') {

            // Buscar la solicitud de traslado por su ID con relaciones necesarias
            $solicitud = SolicitudTraslado::with('solicitante', 'aprobador', 'mobiliarios')->findOrFail($id);

            // Datos del solicitante
            $solicitante = $solicitud->solicitante;

            // Datos del aprobador
            $aprobador = $solicitud->aprobador;

            // Obtener los mobiliarios relacionados directamente
            $mobiliarios = $solicitud->mobiliarios->map(function ($mobiliario) {
                return [
                    'codigo' => $mobiliario->codigo,
                    'nombre_mobiliario' => $mobiliario->nombre_mobiliario,
                    'ubicacion' => $mobiliario->ubicacion,
                ];
            });

            // Guardar en la sesión los datos estructurados
            session([
                'solicitante' => [
                    'nombre' => $solicitante->nombre,
                    'apellido' => $solicitante->apellido,
                    'nombre_completo' => $solicitante->nombre . ' ' . $solicitante->apellido,
                ],
                'aprobador' => [
                    'nombre' => $aprobador->nombre ?? 'Desconocido',
                    'apellido' => $aprobador->apellido ?? '',
                    'nombre_completo' => isset($aprobador->nombre)
                        ? $aprobador->nombre . ' ' . $aprobador->apellido
                        : 'Desconocido',
                ],
                'mobiliarios' => $mobiliarios,
                'fecha' => $solicitud->created_at->format('d/m/Y'),
            ]);

            $this->redirectRoute('info-solicitud-traslado');
        } else {

            // Buscar el solicitud de entrega por su ID
            $solicitud = SolicitudInsumos::with('user', 'detalles_solicitud_insumos.articulo')->findOrFail($id);

            // Obtener los artículos y cantidades desde los detalles del solicitud
            $articulos = $solicitud->detalles_solicitud_insumos->pluck('articulo');
            $cantidades = $solicitud->detalles_solicitud_insumos->pluck('cantidad');

            $fecha = $solicitud->created_at->format('Y-m-d');

            // Guardar en la sesión
            session([
                'articulos' => $articulos,
                'cantidades' => $cantidades,
                'fecha' => $fecha // Aquí se utiliza el formato correcto
            ]);

            $this->redirectRoute('info-solicitud-insumos');
        }
    }

    public function render()
    {
        return view('livewire.admin.ver-solicitudes-pendientes', [
            'solicitudesPendientes' => $this->solicitudesPendientes,
        ]);
    }
}
