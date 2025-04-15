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
    public $situacionesMigratorias = [];
    public $migrantesEnTransito = 0;
    public $migrantesEnProteccion = 0;


    public function updated()
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

            // Situaciones
            $situaciones = Expediente::select('situacion_migratoria_id', DB::raw('count(*) as total_situaciones'))
                ->whereBetween('created_at', [$this->fecha_inicio, $this->fecha_final])
                ->groupBy('situacion_migratoria_id')
                ->orderBy('total_situaciones', 'desc')
                ->with('situacionMigratoria')
                ->get();


            $this->situacionesMigratorias = $situaciones->pluck('total_situaciones', 'situacionMigratoria.situacion_migratoria')->toArray();

            $this->familias = Migrante::select('*')
                ->whereBetween('created_at', [$this->fecha_inicio, $this->fecha_final])
                ->whereNot('codigo_familiar', 0)
                ->distinct('codigo_familiar')
                ->count();
        } else {
            $this->cantidad_migrantes = 0;
            $this->cantidad_hombres = 0;
            $this->cantidad_mujeres = 0;
            $this->cantidad_ninos = 0;
            $this->cantidad_ninas = 0;
            $this->migrantesEnTransito = 0;
            $this->migrantesEnProteccion = 0;
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
                ->with('pais') // Asegúrate de que la relación 'pais' esté definida en el modelo Migrante
                ->get();

            $data = $this->paises->pluck('total_migrantes')->toArray();
            $labels = $this->paises->pluck('pais.nombre_pais')->toArray();
            // $data = [1, 2, 3, 4, 32, 6, 7, 8, 9, 10, 11, 12, 13, 14, 40, 16, 17, 18];

            // $labels = [
            //     "Reg-1",
            //     "Reg-2",
            //     "Reg-3",
            //     "Reg-4",
            //     "Reg-5",
            //     "Reg-6",
            //     "Reg-7",
            //     "Reg-8",
            //     "Reg-9",
            //     "Reg-10",
            //     "Reg-11",
            //     "Reg-12",
            //     "Reg-13",
            //     "Reg-14",
            //     "Reg-15",
            //     "Reg-16",
            //     "Emiratos Árabes Unidos",
            //     "Reg-18",
            // ];

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
            ->size(['width' => 350, 'height' => 300])
            ->options([
                'indexAxis' => 'y',
                "responsive" => true,
                'layout' => [
                    'padding' => [
                        'right' => 30
                    ]
                ],
                "plugins" => [
                    "legend" => [
                        "display" => false
                    ],
                    "datalabels" => [
                        "color" => "#000",
                        "anchor" => "end",  // Coloca las etiquetas al final de las barras
                        "align" => "right", // Alinea el texto a la derecha (fuera de la barra)
                        "formatter" => "function(value) { return value; }", // Muestra el valor
                        "font" => [
                            "weight" => "bold"
                        ]
                    ]
                ],
                "scales" => [
                    "x" => [
                        'position' => 'bottom',
                        "display" => true,
                        "grid" => [
                            "display" => true
                        ],
                        "ticks" => [
                            "font" => [
                                "weight" => "bold"
                            ]
                        ]
                    ],
                    "y" => [
                        "beginAtZero" => true,
                        "grid" => [
                            "display" => false
                        ],
                        "ticks" => [
                            "font" => [
                                "weight" => "bold"
                            ]
                        ]
                    ]
                ]
            ]);
    }

    public function render()
    {
        $this->getData();

        return view('livewire.reportes.reporte-mensual');
    }
}
