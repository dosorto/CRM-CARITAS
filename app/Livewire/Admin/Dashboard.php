<?php

namespace App\Livewire\Admin;

use App\Models\Expediente;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use App\Models\Migrante;
use Illuminate\Support\Facades\DB;

// #[Lazy()]
class Dashboard extends Component
{
    public $currentYear;
    public $nombreMes;
    public $numeroDia;
    public $total_personas = 0;
    public $total_migrantes = 0;
    // Anillo de Cargando cuando el componente tarda
    public function placeholder()
    {
        return <<<'HTML'
            <div class="size-full h-screen flex items-center justify-center">
                <span class="loading loading-ring loading-lg"></span>
            </div>
            HTML;
    }

    public function render()
    {
        $migrantesPorMes = Migrante::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('mes')
            ->pluck('total', 'mes');


        $datosPorMes = array_fill(1, 12, 0);

        foreach ($migrantesPorMes as $mes => $total) {
            $datosPorMes[$mes] = $total;
        }


        $migrantes = Expediente::where('fecha_salida', null)->count();

        $hombres = Migrante::where('sexo', 'M')
            ->where('deleted_at', null)
            ->whereHas('expedientes', function ($query) {
                $query->where('fecha_salida', null);
            })
            ->count();


        $mujeres = Migrante::where('sexo', 'F')
            ->where('deleted_at', null)
            ->whereHas('expedientes', function ($query) {
                $query->where('fecha_salida', null);
            })
            ->count();

        $paises = Migrante::select('pais_id', DB::raw('count(*) as total_migrantes'))
            ->where('deleted_at', null) // Filtrar por rango de fechas
            ->groupBy('pais_id')
            ->orderBy('total_migrantes', 'desc')
            ->limit(5)
            ->with('pais')
            ->whereHas('expedientes', function ($query) {
                $query->where('fecha_salida', null);
            }) // Asegúrate de que la relación 'pais' esté definida en el modelo Migrante
            ->get();

        $data = $paises->pluck('total_migrantes')->toArray();
        $labels = $paises->pluck('pais.nombre_pais')->toArray();

        $chartDonut = Chartjs::build()
            ->name('pieChartTest')
            ->type('doughnut')
            ->size(['width' => 400, 'height' => 200])
            ->labels($labels)
            ->datasets([
                [
                    'backgroundColor' => ['#805AD5', '#38B2AC', '#4299E1', '#FF6B6B', '#FFDDC1'],
                    'hoverBackgroundColor' => ['#805AD5', '#38B2AC', '#4299E1', '#FF6B6B', '#FFDDC1'],
                    'data' => $data
                ]
            ])
            ->options(['responsive' => [true]]);

        $chart = Chartjs::build()
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'])
            ->datasets([
                [
                    "label" => "Entrantes",
                    'backgroundColor' => ['#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B',],
                    //Lista de entrantes ordenandolos por mes inciando desde enero
                    'data' => array_values($datosPorMes)
                ],
                [
                    "label" => "salientes",
                    'backgroundColor' => ['#6B6BFF', '#6B6BFF', '#6B6BFF', '#6B6BFF', '#6B6BFF', '#6B6BFF', '#6B6BFF', '#6B6BFF', '#6B6BFF', '#6B6BFF', '#6B6BFF', '#6B6BFF',],
                    //Lista de entrantes ordenandolos por mes inciando desde enero
                    'data' => array_values($datosPorMes)
                ],
            ])
            ->options([
                "scales" => [
                    "y" => [
                        "beginAtZero" => true,
                    ]
                ]
            ]);
        return view('livewire.admin.dashboard',  compact('chartDonut', 'chart', 'migrantes', 'hombres', 'mujeres'));
    }
}
