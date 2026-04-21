<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
use App\Models\Expediente;
use App\Models\Pais;
use App\Models\Frontera;
use App\Models\AsesorMigratorio;
use App\Models\SituacionMigratoria;
use App\Models\MotivoSalidaPais;
use App\Models\Necesidad;
use App\Models\Discapacidad;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy()]
class EditarMigrante extends Component
{
    public $migranteId;
    public $expedienteId;

    // Migrante
    public $primer_nombre = '';
    public $segundo_nombre = '';
    public $primer_apellido = '';
    public $segundo_apellido = '';
    public $sexo = '';
    public $tipo_identificacion = '';
    public $numero_identificacion = '';
    public $pais_id = null;
    public $estado_civil = '';
    public $codigo_familiar = null;
    public $es_lgbt = false;
    public $fecha_nacimiento = null;
    public $tipo_sangre = '';

    // Expediente
    public $frontera_id = null;
    public $asesor_migratorio_id = null;
    public $situacion_migratoria_id = null;
    public $observacion = '';
    public $fecha_ingreso = null;
    public $fallecimiento = false;
    public $fecha_salida = null;
    public $atencion_psicologica = false;
    // public $asesoria_psicologica = false;
    public $atencion_legal = false;
    public $asesoria_psicosocial = false;

    // Pivotes
    public $motivos_salida = [];
    public $necesidades = [];
    public $discapacidades = [];

    public function mount($id)
    {
        $this->migranteId = $id;
        $migrante = Migrante::findOrFail($id);

        $this->primer_nombre        = $migrante->primer_nombre;
        $this->segundo_nombre       = $migrante->segundo_nombre;
        $this->primer_apellido      = $migrante->primer_apellido;
        $this->segundo_apellido     = $migrante->segundo_apellido;
        $this->sexo                 = $migrante->sexo;
        $this->tipo_identificacion  = $migrante->tipo_identificacion;
        $this->numero_identificacion = $migrante->numero_identificacion;
        $this->pais_id              = $migrante->pais_id;
        $this->estado_civil         = $migrante->estado_civil;
        $this->codigo_familiar      = $migrante->codigo_familiar;
        $this->es_lgbt              = (bool) $migrante->es_lgbt;
        $this->fecha_nacimiento     = optional($migrante->fecha_nacimiento)->format('Y-m-d');
        $this->tipo_sangre          = $migrante->tipo_sangre;

        // Último expediente (cambia el criterio si prefieres otro)
        $expediente = Expediente::where('migrante_id', $id)->latest('id')->first();

        if ($expediente) {
            $this->expedienteId             = $expediente->id;
            $this->frontera_id              = $expediente->frontera_id;
            $this->asesor_migratorio_id     = $expediente->asesor_migratorio_id;
            $this->situacion_migratoria_id  = $expediente->situacion_migratoria_id;
            $this->observacion              = $expediente->observacion;
            $this->fecha_ingreso            = optional($expediente->fecha_ingreso)->format('Y-m-d');
            $this->fallecimiento            = (bool) $expediente->fallecimiento;
            $this->fecha_salida             = optional($expediente->fecha_salida)->format('Y-m-d');
            $this->atencion_psicologica     = (bool) $expediente->atencion_psicologica;
            // $this->asesoria_psicologica     = (bool) $expediente->asesoria_psicologica;
            $this->atencion_legal           = (bool) $expediente->atencion_legal;
            $this->asesoria_psicosocial     = (bool) $expediente->asesoria_psicosocial;

            $this->motivos_salida = $expediente->motivosSalidaPais->pluck('id')->map(fn($v) => (string) $v)->toArray();
            $this->necesidades    = $expediente->necesidades->pluck('id')->map(fn($v) => (string) $v)->toArray();
            $this->discapacidades = $expediente->discapacidades->pluck('id')->map(fn($v) => (string) $v)->toArray();
        }
    }

    public function guardar()
    {
        $this->validate([
            'primer_nombre'         => 'required|string|max:255',
            'segundo_nombre'        => 'nullable|string|max:255',
            'primer_apellido'       => 'nullable|string|max:255',
            'segundo_apellido'      => 'nullable|string|max:255',
            'sexo'                  => 'required|string',
            'tipo_identificacion'   => 'nullable|string',
            'numero_identificacion' => 'nullable|string|max:20|unique:migrantes,numero_identificacion,' . $this->migranteId,
            'pais_id'               => 'nullable|exists:paises,id',
            'estado_civil'          => 'required|string',
            'codigo_familiar'       => 'nullable|integer|min:0',
            'es_lgbt'               => 'boolean',
            'fecha_nacimiento'      => 'nullable|date',
            'tipo_sangre'           => 'nullable|string',

            'frontera_id'               => 'nullable|exists:fronteras,id',
            'asesor_migratorio_id'      => 'nullable|exists:asesores_migratorios,id',
            'situacion_migratoria_id'   => 'nullable|exists:situaciones_migratorias,id',
            'observacion'               => 'nullable|string|max:255',
            'fecha_ingreso'             => 'nullable|date',
            'fallecimiento'             => 'boolean',
            'fecha_salida'              => 'nullable|date|after_or_equal:fecha_ingreso',
            'atencion_psicologica'      => 'nullable|boolean',
            // 'asesoria_psicologica'      => 'nullable|boolean',
            'atencion_legal'            => 'nullable|boolean',
            'asesoria_psicosocial'      => 'nullable|boolean',

            'motivos_salida.*'  => 'exists:motivos_salida_pais,id',
            'necesidades.*'     => 'exists:necesidades,id',
            'discapacidades.*'  => 'exists:discapacidades,id',
        ]);

        $migrante = Migrante::findOrFail($this->migranteId);
        $migrante->update([
            'primer_nombre'         => $this->primer_nombre,
            'segundo_nombre'        => $this->segundo_nombre,
            'primer_apellido'       => $this->primer_apellido,
            'segundo_apellido'      => $this->segundo_apellido,
            'sexo'                  => $this->sexo,
            'tipo_identificacion'   => $this->tipo_identificacion,
            'numero_identificacion' => $this->numero_identificacion,
            'pais_id'               => $this->pais_id ?: null,
            'estado_civil'          => $this->estado_civil,
            'codigo_familiar'       => $this->codigo_familiar ?: 0,
            'es_lgbt'               => $this->es_lgbt,
            'fecha_nacimiento'      => $this->fecha_nacimiento ?: null,
            'tipo_sangre'           => $this->tipo_sangre ?: null,
            'updated_by'            => Auth::id(),
        ]);

        if ($this->expedienteId) {
            $expediente = Expediente::findOrFail($this->expedienteId);
            $expediente->update([
                'frontera_id'             => $this->frontera_id ?: null,
                'asesor_migratorio_id'    => $this->asesor_migratorio_id ?: null,
                'situacion_migratoria_id' => $this->situacion_migratoria_id ?: null,
                'observacion'             => $this->observacion ?: null,
                'fecha_ingreso'           => $this->fecha_ingreso ?: null,
                'fallecimiento'           => $this->fallecimiento,
                'fecha_salida'            => $this->fecha_salida ?: null,
                'atencion_psicologica'    => $this->atencion_psicologica,
                // 'asesoria_psicologica'    => $this->asesoria_psicologica,
                'atencion_legal'          => $this->atencion_legal,
                'asesoria_psicosocial'    => $this->asesoria_psicosocial,
                'updated_by'              => Auth::id(),
            ]);

            $expediente->motivosSalidaPais()->sync($this->motivos_salida);
            $expediente->necesidades()->sync($this->necesidades);
            $expediente->discapacidades()->sync($this->discapacidades);
        }

        session()->flash('ok', 'Datos actualizados correctamente');
        $this->redirectRoute('ver-historial', $this->migranteId);
    }

    public function salir()
    {
        $this->redirectRoute('ver-historial', $this->migranteId);
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public function render()
    {
        return view('livewire.crud.migrantes.editar-migrante', [
            'paises'             => Pais::orderBy('nombre_pais')->get(),
            'fronteras'          => Frontera::orderBy('frontera')->get(),
            'asesores'           => AsesorMigratorio::orderBy('asesor_migratorio')->get(),
            'situaciones'        => SituacionMigratoria::orderBy('situacion_migratoria')->get(),
            'motivosSalida'      => MotivoSalidaPais::orderBy('motivo_salida_pais')->get(),
            'necesidadesList'    => Necesidad::orderBy('necesidad')->get(),
            'discapacidadesList' => Discapacidad::orderBy('discapacidad')->get(),
        ]);
    }
}
