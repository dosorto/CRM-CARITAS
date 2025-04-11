<?php

namespace App\Livewire\Reportes;

use App\Models\Expediente;
use App\Models\Migrante;
use Livewire\Component;
use Carbon\Carbon;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;

class ReporteMensual extends Component
{
    public $fecha_inicio;
    public $fecha_final;
    public $cantidad_migrantes = 0;
    public $cantidad_hombres = 0;
    public $cantidad_mujeres = 0;
    public $cantidad_ninos = 0;
    public $cantidad_ninas = 0;
    public $total_personas = 0;
    public $currentYear;
    public $nombreMes;
    public $numeroDia;
    public $paises;
    public $grafico = true;
    public $datasets;

    public $familias = 0;
    public $migrantesEnTransito = 0;
    public $migrantesEnProteccion = 0;


    public function updated($propertyName)
    {
        if ($this->fecha_inicio && $this->fecha_final) {
            // $this->grafico = true;
            $today = now();
            $edad = $today->copy()->subYears(15);

            $this->cantidad_migrantes = Migrante::whereBetween('created_at', [$this->fecha_inicio, $this->fecha_final])->count();
            // dd($this->cantidad_migrantes);
            $this->cantidad_hombres = Migrante::where('sexo', 'M')
                ->whereBetween('created_at', [$this->fecha_inicio, $this->fecha_final])
                ->whereDate('fecha_nacimiento', '<', $edad)
                ->count();

            $this->cantidad_mujeres = Migrante::where('sexo', 'F')
                ->whereBetween('created_at', [$this->fecha_inicio, $this->fecha_final])
                ->whereDate('fecha_nacimiento', '<=', $edad)
                ->count();

            $this->cantidad_ninos = Migrante::where('sexo', 'M')
                ->whereBetween('created_at', [$this->fecha_inicio, $this->fecha_final])
                ->whereDate('fecha_nacimiento', '>=', $edad)
                ->count();

            $this->cantidad_ninas = Migrante::where('sexo', 'F')
                ->whereBetween('created_at', [$this->fecha_inicio, $this->fecha_final])
                ->whereDate('fecha_nacimiento', '>=', $edad)
                ->count();

            $this->migrantesEnTransito = Expediente::where('situacion_migratoria_id', 1)
                ->whereBetween('created_at', [$this->fecha_inicio, $this->fecha_final])
                ->count();

            $this->migrantesEnProteccion = Expediente::where('situacion_migratoria_id', 2)
                ->whereBetween('created_at', [$this->fecha_inicio, $this->fecha_final])
                ->count();
        } else {
            $this->cantidad_migrantes = 0;
            $this->cantidad_hombres = 0;
            $this->cantidad_mujeres = 0;
            $this->cantidad_ninos = 0;
            $this->cantidad_ninas = 0;
            $this->migrantesEnTransito = 0;;
            $this->migrantesEnProteccion = 0;;
        }
    }
    public function mount()
    {
        Carbon::setLocale('es');
        $fechaActual = Carbon::now('America/Tegucigalpa');
        $this->nombreMes = ucfirst($fechaActual->translatedFormat('F')); // Mes en español con primera letra en mayúscula
        $this->numeroDia = $fechaActual->day;  // Día de la semana en español con primera letra en mayúscula
        $this->currentYear = now()->year;
        $this->total_personas = Migrante::where('deleted_at', null)
            ->whereYear('created_at', date('Y'))->count();
    }

    public function getData()
    {
        if ($this->fecha_inicio && $this->fecha_final) {

            $this->paises = Migrante::select('pais_id', DB::raw('count(*) as total_migrantes'))
                ->whereBetween('created_at', [$this->fecha_inicio, $this->fecha_final]) // Filtrar por rango de fechas
                ->groupBy('pais_id')
                ->orderBy('total_migrantes', 'desc')
                ->limit(5)
                ->with('pais') // Asegúrate de que la relación 'pais' esté definida en el modelo Migrante
                ->get();

            $data = $this->paises->pluck('total_migrantes')->toArray();
            $labels = $this->paises->pluck('pais.nombre_pais')->toArray();
            // dd($labels);


            $this->datasets = [
                'datasets' => [
                    [
                        "label" => "Migrantes",
                        "backgroundColor" => "#ad342b",
                        "borderColor" => "rgba(38, 185, 154, 0.7)",
                        "data" => $data
                    ]
                ],
                'labels' => $labels
            ];
        }
    }

    #[Computed]
    public function chart()
    {
        return Chartjs::build()
            ->name("Migrantes")
            ->livewire()
            ->model("datasets")
            ->type("bar")
            ->size(['width' => 350, 'height' => 250])
            ->options([
                'indexAxis' => 'y',
                "responsive" => true, // Asegúrate de que el gráfico sea responsivo
                "plugins" => [
                    "legend" => [
                        "display" => false // Oculta la leyenda
                    ]
                ],
                "scales" => [
                    "x" => [
                        'position' => 'top',
                        "display" => true, // Oculta las etiquetas del eje x
                        "grid" => [
                            "display" => true // Quita las líneas de cuadrícula del eje x
                        ]
                    ],
                    "y" => [
                        "beginAtZero" => true,
                        "grid" => [
                            "display" => false // Quita las líneas de cuadrícula del eje y
                        ]
                    ]
                ]
            ]);
    }

    public function render()
    {
        // $chart = Chartjs::build()
        // ->name('barChartTest')
        // ->type('bar')
        // ->size(['width' => 180, 'height' => 110])
        // ->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'otro'])
        // ->datasets([
        //     [
        //         "label" => "", // No se mostrará ya que la leyenda está oculta
        //         'backgroundColor' => ['#ad342b'],
        //         'data' => [69, 59, 0, 0, 0], // Asegúrate de que los datos coincidan con las etiquetas
        //         'barThickness' => 25,
        //         'categoryPercentage' =>0.8, // Reduce la separación entre las categorías
        //         'barPercentage' => 0.8,
        //     ]
        // ])
        // ->options([
        //     'indexAxis' => 'y',
        //     "responsive" => true, // Asegúrate de que el gráfico sea responsivo
        //     "plugins" => [
        //         "legend" => [
        //             "display" => false // Oculta la leyenda
        //         ]
        //     ],
        //     "scales" => [
        //         "x" => [
        //              'position' => 'top',
        //             "display" => true, // Oculta las etiquetas del eje x
        //             "grid" => [
        //                 "display" => true // Quita las líneas de cuadrícula del eje x
        //             ]
        //         ],
        //         "y" => [
        //             "beginAtZero" => true,
        //             "grid" => [
        //                 "display" => false // Quita las líneas de cuadrícula del eje y
        //             ]
        //         ]
        //     ]
        // ]);
        $this->getData();

        return view('livewire.reportes.reporte-mensual');
    }
}
