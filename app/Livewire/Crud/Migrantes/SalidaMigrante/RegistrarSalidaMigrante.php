<?php

namespace App\Livewire\Crud\Migrantes\SalidaMigrante;

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
        'atencionPsicologica' => '¿Recibió atención psicológica?',
        'asesoriaPsicologica' => '¿Recibió asesoría psicológica?',
        'atencionLegal' => '¿Recibió atención legal?',
        'asesoriaPsicosocial' => '¿Recibió asesoría psicosocial?',
    ];

    public $atencionPsicologica = 0;
    public $asesoriaPsicologica = 0;
    public $atencionLegal = 0;
    public $asesoriaPsicosocial = 0;

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
        $expediente = Expediente::where('migrante_id', $migranteId)->first();

        if ($expediente->fecha_salida !== null) {
            // No hay expedientes con fecha nula, significa que ya se registró salida para todos
            $this->cancelar();
        }

        $this->migrante = $this->getMigranteService()->buscar('id', intval($migranteId));

        if (!$this->migrante) {
            $this->cancelar();
        }

        $fechaIngreso = $expediente->created_at->format('d-m-Y');

        if (!$fechaIngreso) {
            // No se encontró el expediente
            $this->cancelar();
        }

        $this->expedienteId = $expediente->id;

        $this->Observaciones = $expediente->observacion;
        $this->fechaSalida = Carbon::now()->format('Y-m-d');

        $this->atencionPsicologica = $expediente->atencion_psicologica ?? 0;
        $this->asesoriaPsicologica = $expediente->asesoria_psicologica ?? 0;
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
        session()->forget('migranteId');
        $this->redirectRoute('ver-migrantes');
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
    public function realizarEncuesta()
    {

    }
}
