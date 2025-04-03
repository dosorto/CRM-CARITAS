<?php

namespace App\Livewire\Actas\ActasEntrega;

use Exception;
use Livewire\Component;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Lazy;

#[Lazy()]
class InfoActaEntrega extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public $nombreMigrante;
    public $numeroIdentificacion;
    public $articulos;
    // public $barcode;
    public $year;
    public $month;
    public $day;

    public function nombreMes($month)
    {
        switch ($month) {
            case 1:
                return 'Enero';
            case 2:
                return 'Febrero';
            case 3:
                return 'Marzo';
            case 4:
                return 'Abril';
            case 5:
                return 'Mayo';
            case 6:
                return 'Junio';
            case 7:
                return 'Julio';
            case 8:
                return 'Agosto';
            case 9:
                return 'Septiembre';
            case 10:
                return 'Octubre';
            case 11:
                return 'Noviembre';
            case 12:
                return 'Diciembre';
            default:
                return 'Mes no válido'; // En caso de un número de mes no válido
        }
    }


    public function mount()
    {
        $migrante = session('migrante');
        $articulos = session('articulos');
        $cantidades = session('cantidades');
        $fecha = session('fecha');

        $carbonDate = Carbon::createFromFormat('Y-m-d', $fecha);
        // Descomponer en año, mes y día
        $this->year = $carbonDate->year;
        $this->month = $this->nombreMes($carbonDate->month);
        $this->day = $carbonDate->day;


        $this->nombreMigrante =
            $migrante->primer_nombre . ' ' .
            $migrante->segundo_nombre . ' ' .
            $migrante->primer_apellido . ' ' .
            $migrante->segundo_apellido;
        $this->numeroIdentificacion = $migrante->numero_identificacion;

        $articulosConCodigo = [];
        $index = 0;
        foreach ($articulos as $articulo) {

            try {
                $articulo->codigoBarrasPNG = $this->generarCodigoBarras($articulo->codigo_barra);
            }
            catch(Exception $e)
            {
                $articulo->codigoBarrasPNG = null;
            }


            // Hay mejor manera de hacer esto?
            $articulo->cantidadEntregada = $cantidades[$index];

            $articulosConCodigo[] = $articulo;
            $index++;
        }

        $this->articulos = $articulosConCodigo;
    }

    public function generarCodigoBarras($codigo)
    {
        $generator = new BarcodeGeneratorPNG();

        return base64_encode($generator->getBarcode($codigo, $generator::TYPE_EAN_13));
    }

    public function render()
    {

        return view('livewire.actas.actas-entrega.info-acta-entrega');
    }
}
