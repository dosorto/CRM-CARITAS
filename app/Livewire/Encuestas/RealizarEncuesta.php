<?php

namespace App\Livewire\Encuestas;

use App\Models\Encuesta;
use App\Models\KPIEncuesta;
use App\Models\Pregunta;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Layout('layouts.empty')]
#[Lazy()]
class RealizarEncuesta extends Component
{
    public $preguntas = [];
    public $respuestas = [];
    public $comentarios = '';
    public $cantidad = 0;

    public $idioma = 'Español';

    public $titulo = [
        'Español' => 'Encuesta de Satisfacción',
        'English' => 'Satisfaction Survey',
    ];

    public $instrucciones = [
        'Español' => [
            'instruccionTitle' => 'Instrucciones: ',
            'instruccion' => 'Responda cada una de las preguntas de manera honesta.'
        ],


        'English' => [
            'instruccionTitle' => 'Instructions: ',
            'instruccion' => 'Answer each question honestly.'
        ],
    ];

    public $btnLabel = [
        'Español' => 'Terminar Encuesta',
        'English' => 'Complete Survey',
    ];
    public $btnLanguageLabel = [
        'Español' => 'Idioma: ',
        'English' => 'Language: ',
    ];

    public function mount()
    {
        Auth::logout();
        $this->preguntas = Pregunta::where('idioma', $this->idioma)->get();
    }

    public function terminarEncuesta()
    {
        // Validate that all questions are answered
        foreach ($this->preguntas as $pregunta) {
            if (!isset($this->respuestas[$pregunta->id_kpi])) {
                $mensaje = $this->idioma == 'Español' ? '* Por favor, responda todas las preguntas.' : '* Please answer all questions.';
                $this->addError('respuestas', $mensaje);
                return;
            }
        }

        if (!$this->cantidad) {
            $mensaje = $this->idioma == 'Español' ? '* Por favor, ingrese el número de personas.' : '* Please enter the number of people.';
            $this->addError('cantidad', $mensaje);
            return;
        }

        $encuesta = new Encuesta();
        $encuesta->comentario = $this->comentarios;
        $encuesta->personas = $this->cantidad;
        $encuesta->save();

        foreach ($this->preguntas as $pregunta) {

            $kpiEncuesta = new KPIEncuesta();

            $kpiEncuesta->respuesta = $this->respuestas[$pregunta->id_kpi];
            $kpiEncuesta->id_kpi = $pregunta->id_kpi;
            $kpiEncuesta->id_encuesta = $encuesta->id;
            $kpiEncuesta->save();
        }

        $this->redirectRoute('login');
    }

    public function cambiarIdioma($nuevoIdioma)
    {
        if ($nuevoIdioma != $this->idioma) {
            $this->idioma = $nuevoIdioma;
            $this->preguntas = Pregunta::where('idioma', $nuevoIdioma)->get();
        }
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center bg-white">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public function render()
    {
        return view('livewire.encuestas.realizar-encuesta');
    }
}
