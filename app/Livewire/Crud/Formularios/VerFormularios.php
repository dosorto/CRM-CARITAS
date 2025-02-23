<?php

namespace App\Livewire\Crud\Formularios;

use App\Models\Expediente;
use App\Models\Migrante;
use App\Services\MigranteService;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Carbon\Carbon;

#[Lazy()]
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


    public function mount($expedienteId)
    {
        $expediente = Expediente::find($expedienteId);

        $migrante = Migrante::find($expediente->migrante_id);

        $nombre = $migrante->primer_nombre . ' ' .
            $migrante->segundo_nombre . ' ' .
            $migrante->primer_apellido . ' ' .
            $migrante->segundo_apellido;
        $this->nombreCompleto = $nombre ?? ' - ';

        $this->fechaIngreso = Carbon::parse($expediente->created_at)->format('d/m/Y') ?? ' - ';

        $this->identificacion = $migrante->numero_identificacion ?? ' - ';

        $this->tipoIdentificacion = $migrante->tipo_identificacion ?? ' - ';

        $this->edad = $this->getMigranteService()->calcularEdad($migrante->fecha_nacimiento) ?? 0;

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

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }
}
