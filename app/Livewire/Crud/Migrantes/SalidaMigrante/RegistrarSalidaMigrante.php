<?php

namespace App\Livewire\Crud\Migrantes\SalidaMigrante;

use App\Models\Expediente;
use App\Services\MigranteService;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class RegistrarSalidaMigrante extends Component
{
    public $datosPersonales = [];
    public $Observaciones;
    public $fechaSalida;

    public $expedienteId;
    public $migranteId;

    public $atencionPsicologica = 0;
    public $asesoriaPsicologica = 0;
    public $atencionLegal = 0;
    public $asesoriaPsicosocial = 0;

    public $preguntas = [
        'atencionPsicologica' => '¿Recibió atención psicológica?',
        'asesoriaPsicologica' => '¿Recibió asesoría psicológica?',
        'atencionLegal' => '¿Recibió atención legal?',
        'asesoriaPsicosocial' => '¿Recibió asesoría psicosocial?',
    ];

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public function mount($migranteId)
    {
        $expediente = Expediente::select('id', 'created_at', 'observacion', 'fecha_salida')
            ->orderBy('id', 'desc')
            ->where('migrante_id', $migranteId)
            ->first();

        if ($expediente->fecha_salida !== null) {
            // No hay expedientes con fecha nula, significa que ya se registró salida para todos
            $this->cancelar();
        }

        $migrante = $this->getMigranteService()->buscar('id', intval($migranteId));

        if (!$migrante) {
            $this->cancelar();
        }

        $fechaIngreso = $expediente->created_at->format('d-m-Y');

        if (!$fechaIngreso) {
            // No se encontró el expediente
            $this->cancelar();
        }


        $nombre = $migrante->primer_nombre . ' ' .
            $migrante->segundo_nombre . ' ' .
            $migrante->primer_apellido . ' ' .
            $migrante->segundo_apellido;

        $this->expedienteId = $expediente->id;
        $this->migranteId = $migranteId;

        $this->datosPersonales = [
            'Nombre Completo' => $nombre,
            'Número de Identidad' => $migrante->numero_identificacion,
            'País de Procedencia' => $migrante->pais->nombre_pais,
            'Fecha de Ingreso' => $fechaIngreso,
            'Edad' => $this->getMigranteService()->calcularEdad($migrante->fecha_nacimiento),
            'Dias de Estancia' => round(Carbon::parse($fechaIngreso)->diffInDays(Carbon::now())),
        ];
        $this->Observaciones = $expediente->observacion;
        $this->fechaSalida = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.crud.migrantes.salida-migrante.registrar-salida-migrante');
    }

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }

    public function cancelar()
    {
        session()->forget('migranteId');
        $this->redirectRoute('ver-migrantes');
    }

    public function updatedFechaSalida($value)
    {
        $fechaIngreso = $this->datosPersonales['Fecha de Ingreso'] ?? null;

        if ($fechaIngreso && $value) {
            $diasDeEstancia = round(Carbon::parse($fechaIngreso)->diffInDays(Carbon::parse($value)));
            $this->datosPersonales['Dias de Estancia'] = $diasDeEstancia;
        }
    }

    public function guardarDatosSalida()
    {
        $expediente = Expediente::find($this->expedienteId);

        $expediente->fecha_salida = $this->fechaSalida;
        $expediente->atencion_psicologica = intval($this->atencionPsicologica);
        $expediente->asesoria_psicologica = intval($this->asesoriaPsicologica);
        $expediente->atencion_legal = intval($this->atencionLegal);
        $expediente->asesoria_psicosocial = intval($this->asesoriaPsicosocial);
        $expediente->observacion = $this->Observaciones;

        $expediente->save();

        return $this->redirectRoute('ver-migrantes');
    }
}
