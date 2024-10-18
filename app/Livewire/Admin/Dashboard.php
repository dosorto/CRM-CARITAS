<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;


class Dashboard extends Component
{
    public function render()
    {
        $chartDonut = Chartjs::build()
            ->name('pieChartTest')
            ->type('doughnut')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Venezuela', 'Colombia', 'Haití', 'Cuba', 'El Salvador'])
            ->datasets([
                [
                    'backgroundColor' => ['#805AD5', '#38B2AC', '#4299E1', '#FF6B6B', '#FFDDC1'],
                    'hoverBackgroundColor' => ['#805AD5', '#38B2AC', '#4299E1', '#FF6B6B', '#FFDDC1'],
                    'data' => [69, 59, 32, 58, 43]
                ]
            ])
            ->options([
                'responsive' => [true],
                'plugins' => [
                    'legend' => [
                        'labels' => [
                            'color' => '#9599A0', // Color equivalente a gray-200
                            'font' => [
                                'size' => 14 // Tamaño opcional
                            ]
                        ]
                    ]
                ]
            ]);




        $chart = Chartjs::build()
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'])
            ->datasets([
                [
                    'label' => 'Entrantes',
                    'backgroundColor' => ['rgba(54, 162, 235, 0.2)'],
                    'data' => [69, 59]
                ],
                [
                    'label' => 'Salientes',
                    'backgroundColor' => ['rgba(255, 99, 132, 0.3)'],
                    'data' => [65, 12]
                ]
            ])
            ->options([
                'scales' => [
                    'y' => [
                        'beginAtZero' => true
                    ]
                ],
                'plugins' => [
                    'legend' => [
                        'labels' => [
                            'color' => '#9599A0', // Color equivalente a gray-200
                            'font' => [
                                'size' => 14 // Tamaño opcional
                            ]
                        ]
                    ]
                ]
            ]);



        return view('livewire.admin.dashboard',  compact('chartDonut', 'chart'));
    }
}
