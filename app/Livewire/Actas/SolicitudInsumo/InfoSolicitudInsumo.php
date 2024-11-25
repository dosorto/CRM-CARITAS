<?php

namespace App\Livewire\Actas\SolicitudInsumo;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Picqer\Barcode\BarcodeGeneratorPNG;

#[Lazy()]
class InfoSolicitudInsumo extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public $nombre;
    public $identificacion;
    public $articulos;
    public $barcode;
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
        $user = Auth::user();
        $articulos = session('articulos');
        $cantidades = session('cantidades');
        $fecha = session('fecha');
        $carbonDate = Carbon::createFromFormat('Y-m-d', $fecha);
        // Descomponer en año, mes y día
        $this->year = $carbonDate->year;
        $this->month = $this->nombreMes($carbonDate->month);
        $this->day = $carbonDate->day;


        $this->nombre =
            $user->nombre . ' ' .
            $user->apellido;
        $this->identificacion = $user->identidad;

        $articulosConCodigo = [];
        $index = 0;
        foreach ($articulos as $articulo) {

            $articulo->codigoBarrasPNG = $this->generarCodigoBarras($articulo->codigo_barra);

            // Hay mejor manera de hacer esto?
            $articulo->cantidadEntregada = $cantidades[$index];

            $articulosConCodigo[] = $articulo;
            $index++;
        }

        $this->articulos = $articulosConCodigo;
    }

    public function generarCodigoBarras($codigo)
    {
        // Validar que el código tenga 12 o 13 dígitos
        if (strlen($codigo) == 12) {
            $codigo .= $this->calcularDigitoVerificacion($codigo);
        } elseif (strlen($codigo) != 13) {
            throw new \InvalidArgumentException('El código debe tener 12 o 13 dígitos.');
        }

        $generator = new BarcodeGeneratorPNG();

        return base64_encode($generator->getBarcode($codigo, $generator::TYPE_EAN_13));
    }

    // Función para calcular el dígito de verificación EAN-13
    private function calcularDigitoVerificacion($codigo)
    {
        $sum = 0;
        foreach (str_split($codigo) as $i => $digit) {
            $sum += ($i % 2 === 0 ? $digit : $digit * 3);
        }
        $modulo = $sum % 10;
        return ($modulo === 0) ? 0 : 10 - $modulo;
    }

    public function render()
    {
        return view('livewire.actas.solicitud-insumo.info-solicitud-insumo');
    }
}
