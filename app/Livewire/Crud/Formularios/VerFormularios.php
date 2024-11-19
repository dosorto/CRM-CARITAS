<?php

namespace App\Livewire\Crud\Formularios;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Carbon\Carbon;

class VerFormularios extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public $nombreCompleto;
    public $fechaIngreso;
    public $identificacion;
    public $tipoIdentificacion;
    public $edad;
    public $sexo;
    public $fechaNacimiento;
    public $pais;
    public $esLGBT;

    public $situacion;
    public $discapacidades;


    public function mount()
    {
        // dd(session()->all());

        // Se extrae el expediente de la sesión.
        $expedienteId = session('expedienteId');
        // session()->forget('expedienteId);
        $expediente = Expediente::find($expedienteId);

        // dd(session('expedienteId'));

        $migrante = Migrante::find($expediente->migrante_id);



        $nombre = $migrante->primer_nombre . ' ' .
            $migrante->segundo_nombre . ' ' .
            $migrante->primer_apellido . ' ' .
            $migrante->segundo_apellido;
        $this->nombreCompleto = $nombre ?? ' - ';

        $this->fechaIngreso = Carbon::parse($expediente->fecha_ingreso)->format('d/m/Y') ?? ' - ';

        $this->identificacion = $migrante->numero_identificacion ?? ' - ';

        $this->tipoIdentificacion = $migrante->tipo_identificacion ?? ' - ';

        $this->edad = $this->calcularEdad($migrante->fecha_nacimiento) ?? 0;

        $this->sexo = $migrante->sexo == 'M' ? 'Masculino' : 'Femenino' ?? ' - ';

        $this->fechaNacimiento = Carbon::parse($migrante->fecha_nacimiento)->format('d/m/Y') ?? ' - ';

        $this->pais = $migrante->pais->nombre_pais ?? ' - ';

        $this->esLGBT = $migrante->esLGBT ? 'Si' : 'No' ?? ' - ';

        $this->situacion = $expediente->situacionMigratoria->situacion_migratoria ?? ' - ';

        $this->discapacidades = implode(', ', $expediente->discapacidades->pluck('discapacidad')->toArray()) ?? ' - ';
    }

    public function render()
    {
        return view('livewire.crud.formularios.ver-formularios');
    }


    public function calcularEdad($fechaNacimiento)
    {
        // Asegúrate de que la fecha de nacimiento esté bien parseada
        $fecha = Carbon::parse($fechaNacimiento);
        // Calcula la edad en años
        return $fecha->age;
    }
}
