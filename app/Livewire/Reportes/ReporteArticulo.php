<?php

namespace App\Livewire\Reportes;

use App\Models\Donacion;
use App\Models\DonacionArticulo;
use App\Models\Donante;
use Livewire\Component;

class ReporteArticulo extends Component
{
    public $mes_seleccionado;
    public $donaciones = [];
    public $cantidad_ingreso;


    public function render()
    {

        if($this->mes_seleccionado != null){
            $this->donaciones = DonacionArticulo::
            whereHas('donacion', function ($query) {
                $query->whereMonth('fecha_donacion', $this->mes_seleccionado);
            })
            ->get();

            $this->cantidad_ingreso = DonacionArticulo::
            whereHas('donacion', function ($query) {
                $query->whereMonth('fecha_donacion', $this->mes_seleccionado);
            })
            ->count();
        }else{
            $this->mes_seleccionado = now()->month;
            $this->donaciones = DonacionArticulo::
            whereHas('donacion', function ($query) {
                $query->whereMonth('fecha_donacion', $this->mes_seleccionado);
            })
            ->get();

            $this->cantidad_ingreso = DonacionArticulo::
            whereHas('donacion', function ($query) {
                $query->whereMonth('fecha_donacion', $this->mes_seleccionado);
            })
            ->count();
        }


        return view('livewire.reportes.reporte-articulo');
    }
}
