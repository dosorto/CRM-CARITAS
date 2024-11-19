<?php

namespace App\Livewire\Actas\SolicitudTraslado;

use Livewire\Component;
use Illuminate\Support\Carbon;

class InfoSolicitudTraslado extends Component
{
    public $nombreSolicitante;
    public $nombreAprobador;
    public $mobiliariosSeleccionados;
    public $year;
    public $month;
    public $day;

    //Devuelve el nombre del mes según su número.
    public function nombreMes($month)
    {
        $nombresMeses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        return $nombresMeses[$month] ?? 'Mes no válido';
    }

    public function mount()
    {
        $solicitante = session('solicitante');
        $aprobador = session('aprobador');
        $mobiliarios = session('mobiliarios');
        $fecha = session('fecha');

        if (!$solicitante || !$aprobador || !$mobiliarios || !$fecha) {
            abort(404, 'Datos incompletos para mostrar la solicitud.');
        }

        // Procesar datos del solicitante y aprobador
        $this->nombreSolicitante = $solicitante['nombre_completo'] ?? $solicitante['nombre'];
        $this->nombreAprobador = $aprobador['nombre_completo'] ?? $aprobador['nombre'];

        // Procesar fecha
        $carbonDate = Carbon::now(); // Usar la fecha actual
        $this->year = $carbonDate->year;
        $this->month = $this->nombreMes($carbonDate->month);
        $this->day = $carbonDate->day;

        // Procesar mobiliarios seleccionados
        $this->mobiliariosSeleccionados = $mobiliarios;
    }

    public function render()
    {
        return view('livewire.actas.solicitud-traslado.info-solicitud-traslado');
    }
}
