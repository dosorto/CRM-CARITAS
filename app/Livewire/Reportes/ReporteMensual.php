<?php

namespace App\Livewire\Reportes;

use Livewire\Component;

class ReporteMensual extends Component
{


    public $fecha_inicio;
    public $fecha_final;
    public $cantidad_migrantes;
    public $cantidad_hombres;
    public $cantidad_mujeres;
    public $cantidad_ninos;
    public $cantidad_ninas;



    public function render()
    {
        return view('livewire.reportes.reporte-mensual');
    }





}
