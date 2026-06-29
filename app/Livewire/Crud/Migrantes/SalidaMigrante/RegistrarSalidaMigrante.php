<?php

namespace App\Livewire\Crud\Migrantes\SalidaMigrante;

use App\Models\CupoEncuesta;
use App\Models\Expediente;
use App\Models\Migrante;
use App\Services\MigranteService;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class RegistrarSalidaMigrante extends Component
{
    public $Observaciones;
    public $fechaSalida;

    public $expedienteId;
    public $migrante;
    public $migranteId;

    public $preguntas = [
        'atencionLegal' => '¿Recibió atención legal?',
        'asesoriaPsicosocial' => '¿Recibió asesoría psicosocial?',
        'atencionPsicologica' => '¿Recibió atención psicológica?',
    ];

    public $atencionPsicologica = 0;
    public $atencionLegal = 0;
    public $asesoriaPsicosocial = 0;

    public $cuposDisponibles;
    public $cantidadEncuestas = 1;

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
        $this->cuposDisponibles = CupoEncuesta::disponibles();

        $expediente = Expediente::where('migrante_id', $migranteId)->first();

        if ($expediente->fecha_salida !== null) {
            $this->cancelar();
        }

        $this->migrante = $this->getMigranteService()->buscar('id', intval($migranteId));

        if (!$this->migrante) {
            $this->cancelar();
        }

        $fechaIngreso = $expediente->created_at->format('d-m-Y');

        if (!$fechaIngreso) {
            $this->cancelar();
        }

        $this->expedienteId = $expediente->id;

        $this->Observaciones = $expediente->observacion;
        $this->fechaSalida = Carbon::now()->format('Y-m-d');

        $this->atencionPsicologica = $expediente->atencion_psicologica ?? 0;
        $this->atencionLegal = $expediente->atencion_legal ?? 0;
        $this->asesoriaPsicosocial = $expediente->asesoria_psicosocial ?? 0;
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
        $this->redirectRoute('ver-migrantes');
    }

    public function guardarDatosSalida()
    {
        $this->guardarDatos();

        return $this->redirectRoute('ver-migrantes');
    }

    public function guardarYHabilitarEncuesta()
    {
        $this->validate([
            'cantidadEncuestas' => 'required|integer|min:1',
        ], [
            'cantidadEncuestas.required' => 'Ingrese la cantidad de encuestas a habilitar.',
            'cantidadEncuestas.integer' => 'La cantidad debe ser un número entero.',
            'cantidadEncuestas.min' => 'La cantidad debe ser al menos 1.',
        ]);

        $this->guardarDatos();

        CupoEncuesta::incrementar($this->cantidadEncuestas);

        return $this->redirectRoute('ver-migrantes');
    }

    public function guardarDatos()
    {
        $expediente = Expediente::find($this->expedienteId);

        $expediente->fecha_salida = $this->fechaSalida;
        $expediente->atencion_legal = intval($this->atencionLegal);
        $expediente->asesoria_psicosocial = intval($this->asesoriaPsicosocial);
        $expediente->atencion_psicologica = intval($this->atencionPsicologica);
        $expediente->observacion = $this->Observaciones;

        $expediente->save();
    }
}
