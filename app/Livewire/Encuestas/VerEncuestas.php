<?php

namespace App\Livewire\Encuestas;

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

    // Anillo de Cargando cuando el componente tarda
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

            $this->kpis[$i]->porcentaje = round(($this->kpis[$i]->cantidadSi / $this->totalEncuestas) * 100, 2);

            $totalPorcentaje += $this->kpis[$i]->porcentaje;
        }

        $this->satisfaccionGeneral = round($totalPorcentaje / KPI::count(), 2);

        $this->comentarios = Encuesta::select('id', 'comentario', 'created_at')
            ->whereNot('comentario', null)
            ->get();

        foreach ($this->comentarios as $i => $comentario)
        {
            $this->comentarios[$i]->fecha = $comentario->created_at->format('d/m/Y');
        }
    }

    public function render()
    {
        return view('livewire.encuestas.ver-encuestas');
    }
}
