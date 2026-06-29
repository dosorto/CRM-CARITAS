<?php

namespace App\Livewire\Encuestas;

use App\Models\CupoEncuesta;
use App\Models\Encuesta;
use App\Models\KPI;
use App\Models\KPIEncuesta;
use App\Models\Pregunta;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy()]
class VerEncuestas extends Component
{
    public $totalEncuestas;
    public $satisfaccionGeneral;

    public $encuestas;
    public $kpis;

    public $comentarios;

    public $cuposDisponibles;
    public $cantidadCupos = 1;
    public $accion = 'sumar';

    public function placeholder()
    {
        return <<<'HTML'
                <div class="size-full h-screen flex items-center justify-center">
                    <span class="loading loading-ring loading-lg"></span>
                </div>
                HTML;
    }

    public function mount()
    {
        $this->cuposDisponibles = CupoEncuesta::disponibles();
        $this->totalEncuestas = Encuesta::count();

        $this->kpis = KPI::select('id', 'kpi')->get();

        $totalPorcentaje = 0;

        foreach ($this->kpis as $i => $kpi) {
            $pregunta = Pregunta::where('id_kpi', $kpi->id)
                ->where('idioma', 'Español')
                ->first();

            $this->kpis[$i]->pregunta = $pregunta->pregunta;

            $this->kpis[$i]->cantidadSi = KPIEncuesta::where('id_kpi', $kpi->id)
                ->where('respuesta', 1)
                ->count();

            $this->kpis[$i]->cantidadNo = KPIEncuesta::where('id_kpi', $kpi->id)
                ->where('respuesta', 0)
                ->count();

            if ($this->totalEncuestas) {
                $this->kpis[$i]->porcentaje = round(($this->kpis[$i]->cantidadSi / $this->totalEncuestas) * 100, 2);
            } else {
                $this->kpis[$i]->porcentaje = 0;
            }

            $totalPorcentaje += $this->kpis[$i]->porcentaje;
        }

        $this->satisfaccionGeneral = round($totalPorcentaje / KPI::count(), 2);

        $this->comentarios = Encuesta::select('id', 'comentario', 'created_at')
            ->whereNot('comentario', null)
            ->get();

        foreach ($this->comentarios as $i => $comentario) {
            $this->comentarios[$i]->fecha = $comentario->created_at->format('d/m/Y');
        }
    }

    public function aplicarCupos()
    {
        $this->validate([
            'accion' => 'required|in:establecer,sumar,restar',
            'cantidadCupos' => 'required|integer|min:0',
        ], [
            'accion.required' => 'Seleccione una acción.',
            'accion.in' => 'Acción no válida.',
            'cantidadCupos.required' => 'Ingrese la cantidad.',
            'cantidadCupos.integer' => 'La cantidad debe ser un número entero.',
            'cantidadCupos.min' => 'La cantidad no puede ser negativa.',
        ]);

        if ($this->accion === 'sumar' || $this->accion === 'restar') {
            if ($this->cantidadCupos < 1) {
                $this->addError('cantidadCupos', 'La cantidad debe ser al menos 1 para esta acción.');
                return;
            }
        }

        if ($this->accion === 'restar' && $this->cantidadCupos > $this->cuposDisponibles) {
            $this->addError('cantidadCupos', 'No puede restar más cupos de los disponibles (' . $this->cuposDisponibles . ').');
            return;
        }

        match($this->accion) {
            'establecer' => CupoEncuesta::establecer($this->cantidadCupos),
            'sumar'      => CupoEncuesta::incrementar($this->cantidadCupos),
            'restar'     => CupoEncuesta::restar($this->cantidadCupos),
        };

        $this->cuposDisponibles = CupoEncuesta::disponibles();
        $this->cantidadCupos = 1;
        $this->accion = 'sumar';

        $this->dispatch('close-modal-habilitar');

        session()->flash('exito', 'Cupos actualizados correctamente.');
    }

    public function render()
    {
        return view('livewire.encuestas.ver-encuestas');
    }
}
