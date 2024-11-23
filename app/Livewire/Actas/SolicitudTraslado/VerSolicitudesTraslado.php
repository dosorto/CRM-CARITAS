<?php

namespace App\Livewire\Actas\SolicitudTraslado;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Models\SolicitudTraslado;
use Livewire\Attributes\Lazy;

#[Lazy()]
class VerSolicitudesTraslado extends Component
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

        $fecha = $solicitud->fecha_solicitud;

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
            'fecha' => $fecha,
        ]);

        // Redirigir a la vista de detalles de la solicitud
        return redirect()->to(route('info-solicitud-traslado'));
    }

    public function eliminarSolicitudConfirmacion($id)
    {
        $this->dispatch('confirmarEliminacion', id: $id);
    }

    public function eliminarSolicitud($id)
    {
        $solicitud = SolicitudTraslado::findOrFail($id);
        $solicitud->delete();

        session()->flash('message', 'La solicitud de traslado ha sido eliminada exitosamente.');
    }


    public function render()
    {
        // Obtener las solicitudes con relaciones necesarias
        $solicitudes = SolicitudTraslado::with('solicitante', 'aprobador')->paginate(10);

        // Retornar la vista con los datos paginados
        return view('livewire.actas.solicitud-traslado.ver-solicitudes-traslado')
            ->with('items', $solicitudes);
    }
}
