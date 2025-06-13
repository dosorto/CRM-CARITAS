<?php

namespace App\Livewire\Admin;

use App\Models\Expediente;
use Livewire\Component;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use App\Models\Migrante;
use Illuminate\Support\Facades\DB;
// use Livewire\Attributes\Lazy;

// #[Lazy()]
class Dashboard extends Component
{
    public $currentYear;
    public $nombreMes;
    public $numeroDia;
    public $total_personas = 0;
    public $total_migrantes;

    public $cantidadesMigrantes = [];

    public $situacionesMigratorias = [];

    public $familias = 0;

    // Anillo de Cargando cuando el componente tarda
    // public function placeholder()
    // {
    //     return <<<'HTML'
    //         <div class="size-full h-screen flex items-center justify-center">
    //             <span class="loading loading-ring loading-lg"></span>
    //         </div>
    //         HTML;
    // }

    public function render()
    {
        $migrantesEntrantesPorMes = Expediente::selectRaw('MONTH(fecha_ingreso) as mes, COUNT(*) as total')
            ->whereYear('fecha_ingreso', date('Y'))
            ->groupBy('mes')
            ->pluck('total', 'mes');

        $migrantesSalientesPorMes = Expediente::selectRaw('MONTH(fecha_ingreso) as mes, COUNT(*) as total')
            ->whereYear('fecha_ingreso', date('Y'))
            ->where('fecha_salida', '!=', null)
            ->groupBy('mes')
            ->pluck('total', 'mes');


        $entrantesPorMes = array_fill(1, 12, 0);
        $salientesPorMes = array_fill(1, 12, 0);

        foreach ($migrantesEntrantesPorMes as $mes => $total) {
            $entrantesPorMes[$mes] = $total;
        }

        foreach ($migrantesSalientesPorMes as $mes => $total) {
            $salientesPorMes[$mes] = $total;
        }

        $currentYear = date('Y');


        $hombres = new \stdClass();
        $hombres->cantidad = Migrante::where('sexo', 'M')
            ->where('deleted_at', null)
            ->whereYear('fecha_nacimiento', '<', $currentYear - 15)
            ->whereHas('expedientes', function ($query) {
                $query->where('fecha_salida', null);
            })
            ->count();
        $hombres->label = 'Hombres';
        $hombres->iconClass = 'fa-solid--male';



        $mujeres = new \stdClass();
        $mujeres->cantidad = Migrante::where('sexo', 'F')
            ->where('deleted_at', null)
            ->whereYear('fecha_nacimiento', '<', $currentYear - 15)
            ->whereHas('expedientes', function ($query) {
                $query->where('fecha_salida', null);
            })
            ->count();
        $mujeres->label = 'Mujeres';
        $mujeres->iconClass = 'fa-solid--female';



        $ninos = new \stdClass();
        $ninos->cantidad = Migrante::where('sexo', 'M')
            ->where('deleted_at', null)
            ->whereYear('fecha_nacimiento', '>=', $currentYear - 15)
            ->whereHas('expedientes', function ($query) {
                $query->where('fecha_salida', null);
            })
            ->count();
        $ninos->label = 'Niños';
        $ninos->iconClass = 'fa6-solid--child';



        $ninas = new \stdClass();
        $ninas->cantidad = Migrante::where('sexo', 'F')
            ->where('deleted_at', null)
            ->whereYear('fecha_nacimiento', '>=', $currentYear - 15)
            ->whereHas('expedientes', function ($query) {
                $query->where('fecha_salida', null);
            })
            ->count();
        $ninas->label = 'Niñas';
        $ninas->iconClass = 'fa6-solid--child-dress';



        $migrantes = new \stdClass();
        $migrantes->cantidad = Expediente::where('fecha_salida', null)->count();
        $migrantes->label = 'Migrantes';
        $migrantes->iconClass = 'fa-solid--users';

        // añadir esas cantidades a un array
        $this->cantidadesMigrantes = [$migrantes, $hombres, $mujeres, $ninos, $ninas];


        $paises = Migrante::select('pais_id', DB::raw('count(*) as total_migrantes'))
            ->where('deleted_at', null) // Filtrar por rango de fechas
            ->groupBy('pais_id')
            ->orderBy('total_migrantes', 'desc')
            ->limit(5)
            ->with('pais')
            ->whereHas('expedientes', function ($query) {
                $query->where('fecha_salida', null);
            })
            // ->whereMonth('created_at', date('m'))
            // ->whereYear('created_at', date('Y'))
            ->get();

        $data = $paises->pluck('total_migrantes')->toArray();
        $labels = $paises->pluck('pais.nombre_pais')->toArray();


        $chartDonut = Chartjs::build()
            ->name('pieChartTest')
            ->type('doughnut')
            ->size(['width' => 300, 'height' => 300])
            ->labels($labels)
            ->datasets([
                [
                    'backgroundColor' => ['#805AD5', '#38B2AC', '#4299E1', '#FF6B6B', '#FFFDC0'],
                    'borderColor' => ['#805AD5', '#38B2AC', '#4299E1', '#FF6B6B', '#FFFDC0'],
                    'data' => $data,
                ]
            ])
            ->options([
                'responsive' => true,
                'hover' => [
                    'mode' => null, // desactiva hover
                ],
                'plugins' => [
                    'legend' => [
                        'labels' => [
                            'color' => '#222', // Color del texto de las etiquetas en la leyenda
                            'font' => [
                                'size' => 12 // Tamaño de la fuente (opcional)
                            ]
                        ],
                        'position' => 'top' // Posición de la leyenda (opcional)
                    ],
                    'datalabels' => [
                        'display' => false
                    ]
                ]
            ]);

        $chart = Chartjs::build()
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 600, 'height' => 150])
            ->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'])
            ->datasets([
                [
                    "label" => "Entrantes",
                    'backgroundColor' => ['#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B', '#FF6B6B',],
                    'data' => array_values($entrantesPorMes)
                ],
                [
                    "label" => "Salientes",
                    'backgroundColor' => ['#5175BE', '#5175BE', '#5175BE', '#5175BE', '#5175BE', '#5175BE', '#5175BE', '#5175BE', '#5175BE', '#5175BE', '#5175BE', '#5175BE',],
                    'data' => array_values($salientesPorMes)
                ],
            ])
            ->options([
                'responsive' => true,
                "scales" => [
                    "y" => [
                        "beginAtZero" => true,
                        "grid" => [
                            "color" => "rgba(130, 130, 130, 0.4)" // Color de las líneas de cuadrícula del eje Y
                        ]
                    ],
                    "x" => [
                        "ticks" => [
                            "color" => "#FFFFFF" // Color de las etiquetas del eje X
                        ],
                        "grid" => [
                            "color" => "rgba(130, 130, 130, 0.4)" // Color de las líneas de cuadrícula del eje X
                        ]
                    ]
                ],
                "plugins" => [
                    "legend" => [
                        "labels" => [
                            "color" => "#FFFFFF" // Color del texto en la leyenda
                        ],
                        "position" => "top", // Posición de la leyenda
                    ],
                    "datalabels" => [
                        "display" => false
                    ]
                ]
            ]);


        $this->familias = Migrante::whereNot('codigo_familiar', 0)
            ->whereYear('created_at', date('Y'))
            ->whereHas('expedientes', function ($query) {
                $query->whereNull('fecha_salida');
            })
            ->distinct('codigo_familiar')
            ->count('codigo_familiar');

        $situaciones = Expediente::select('situacion_migratoria', DB::raw('count(*) as cantidad'))
            ->whereMonth('fecha_ingreso', date('m'))
            ->join('situaciones_migratorias', 'expedientes.situacion_migratoria_id', '=', 'situaciones_migratorias.id',)
            ->groupBy('situacion_migratoria')
            ->orderBy('cantidad', 'desc')
            ->limit(5)
            ->get();


        $this->situacionesMigratorias = $situaciones->pluck('cantidad', 'situacion_migratoria')->toArray();

        return view('livewire.admin.dashboard',  compact('chartDonut', 'chart'));
    }
}
