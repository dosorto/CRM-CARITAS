<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use App\Models\Migrante;
use Illuminate\Support\Facades\DB;

// #[Lazy()]
class Dashboard extends Component
{
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
        $migrantes = Migrante::where('deleted_at', null)->count();
        $hombres = Migrante::where('sexo', 'M')
                ->where('deleted_at', null)
                ->count();

        $mujeres = Migrante::where('sexo', 'F')
                ->where('deleted_at', null)
                ->count();

        $paises = Migrante::select('pais_id', DB::raw('count(*) as total_migrantes'))
                ->where('deleted_at', null)// Filtrar por rango de fechas
                ->groupBy('pais_id')
                ->orderBy('total_migrantes', 'desc')
                ->limit(5)
                ->with('pais') // Asegúrate de que la relación 'pais' esté definida en el modelo Migrante
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
                'backgroundColor' => ['#805AD5', '#38B2AC', '#4299E1', '#FF6B6B', '#FFDDC1' ],
                'hoverBackgroundColor' => ['#805AD5', '#38B2AC', '#4299E1', '#FF6B6B', '#FFDDC1' ],
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
                 'backgroundColor' => ['#FF6B6B', '#FF6B6B','#FF6B6B','#FF6B6B','#FF6B6B','#FF6B6B','#FF6B6B','#FF6B6B','#FF6B6B','#FF6B6B','#FF6B6B','#FF6B6B',],
                 //Lista de entrantes ordenandolos por mes inciando desde enero
                 'data' => [69, 59,78]
             ],
             [
                 "label" => "Salientes",
                 'backgroundColor' => ['#4299E1', '#4299E1','#4299E1','#4299E1','#4299E1','#4299E1','#4299E1','#4299E1','#4299E1','#4299E1','#4299E1','#4299E1',],
                 //Lista de salientes ordenandolos por mes inciando desde enero
                 'data' => [65, 12, 100]
             ]
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
