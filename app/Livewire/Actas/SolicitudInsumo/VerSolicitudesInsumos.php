<?php

namespace App\Livewire\Actas\SolicitudInsumo;

use App\Models\SolicitudInsumos;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Lazy()]
class VerSolicitudesInsumos extends Component
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

    public function infoSolicitud($id)
    {
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

        // Redirigir a la ruta donde se mostrará la vista de impresión
        return redirect()->route('info-solicitud-insumos');
    }

    public function render()
    {
        $solicitud = SolicitudInsumos::paginate(10);
        return view('livewire.actas.solicitud-insumo.ver-solicitudes-insumos')
            ->with('items', $solicitud);
    }
}