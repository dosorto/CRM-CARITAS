<?php

namespace App\Livewire\Actas\SolicitudTraslado;

use App\Models\SolicitudTraslado;
use App\Models\Mobiliario;
use App\Models\User;
use App\Models\DetalleSolicitudTraslado;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CrearSolicitudTraslado extends Component
{
    // Lista de mobiliarios cargados para seleccionar manualmente
    public $dataMobiliarios = [];

    // Lista que contiene los mobiliarios seleccionados
    public $mobiliariosSeleccionados = [];

    //public $colSelected = 'Codigo';
    // Input de búsqueda del mobiliario (puede ser código o nombre)
    public $textobusqueda;

    // public $fakeColNames = [
    //     'Codigo' => 'codigo',
    //     'Nombre' => 'nombre_mobiliario',
    // ];


    public function mount()
    {
        // Pre-cargar la lista de mobiliarios
        $this->dataMobiliarios = Mobiliario::select('id', 'codigo', 'nombre_mobiliario', 'ubicacion')->get();
    }

    public function render()
    {
        return view('livewire.actas.solicitud-traslado.crear-solicitud-traslado');
    }

    public function agregarMobiliario($termino)
    {
        // Convertir el término de búsqueda a minúsculas y eliminar espacios innecesarios
        $termino = trim(strtolower($termino));

        // Verificar si el mobiliario ya está en la lista seleccionada
        foreach ($this->mobiliariosSeleccionados as $mobiliario) {
            if (strtolower($mobiliario['codigo']) === $termino || strtolower($mobiliario['nombre_mobiliario']) === $termino) {
                throw ValidationException::withMessages([
                    'textobusqueda' => ['El mobiliario ya está seleccionado.']
                ]);
            }
        }

        $mobiliario = Mobiliario::select('id', 'codigo', 'nombre_mobiliario', 'ubicacion')
            ->where(function ($query) use ($termino) {
                $query->whereRaw('LOWER(codigo) LIKE ?', ['%' . $termino . '%'])
                    ->orWhereRaw('LOWER(nombre_mobiliario) LIKE ?', ['%' . $termino . '%']);
            })
            ->first();

        if (!$mobiliario) {
            throw ValidationException::withMessages([
                'textobusqueda' => ['No se encontró ningún mobiliario que coincida con "' . $termino . '".']
            ]);
        }

        // Agregar el mobiliario a la lista seleccionada
        $this->mobiliariosSeleccionados[] = [
            'id' => $mobiliario->id,
            'codigo' => $mobiliario->codigo,
            'nombre_mobiliario' => $mobiliario->nombre_mobiliario,
            'ubicacion' => $mobiliario->ubicacion,
        ];
    }

    // Resetear el formulario
    //$this->resetForm();

    public function crearSolicitudTraslado()
    {
        // Validar que haya mobiliarios seleccionados
        if (empty($this->mobiliariosSeleccionados)) {
            throw ValidationException::withMessages([
                'mobiliarios' => ['Debe seleccionar al menos un mobiliario para el traslado.']
            ]);
        }

        // Obtener el usuario de la sesión activa como solicitante
        $solicitanteId = Auth::user()->id;

        // Crear la solicitud de traslado
        $solicitud = new SolicitudTraslado();
        $solicitud->solicitante_id = $solicitanteId;
        $solicitud->aprobador_id = 1; // Opcional, se puede asignar luego
        $solicitud->save();

        // Asociar los mobiliarios seleccionados con la solicitud y actualizar sus ubicaciones
        foreach ($this->mobiliariosSeleccionados as $mobiliarioSeleccionado) {
            // Crear un registro en la tabla detalles_solicitud_traslado
            DetalleSolicitudTraslado::create([
                'solicitud_traslado_id' => $solicitud->id,
                'mobiliario_id' => $mobiliarioSeleccionado['id'],
            ]);

            // Actualizar la ubicación del mobiliario
            $mobiliario = Mobiliario::find($mobiliarioSeleccionado['id']);
            if ($mobiliario) {
                // Alternar la ubicación
                $mobiliario->ubicacion = $mobiliario->ubicacion === 'Bodega' ? 'Casa' : 'Bodega';
                $mobiliario->save();
            }
        }

        session([
            'solicitante' => [
                'nombre' => Auth::user()->nombre,
                'apellido' => Auth::user()->apellido,  // Asegúrate de agregar el apellido
                'nombre_completo' => Auth::user()->nombre . ' ' . Auth::user()->apellido
            ],
            'aprobador' => [
                'id' => 1,
                'nombre' => User::find(1)->nombre,
                'apellido' => User::find(1)->apellido,  // Asegúrate de agregar el apellido
                'nombre_completo' => User::find(1) ? 
                    User::find(1)->nombre . ' ' . User::find(1)->apellido : 
                    'Desconocido'
            ],
            'mobiliarios' => $this->mobiliariosSeleccionados,
            'fecha' => Carbon::now(),
        ]);
        
        return redirect()->to(route('info-solicitud-traslado'));

        // Redirigir a una vista o mostrar un mensaje de éxito
        //return redirect()->route('info-solicitud-traslado');
    }

    public function resetForm()
    {
        $this->textobusqueda = ''; // Reiniciar el campo de búsqueda
        // Enfocar automáticamente en el campo del texto de búsqueda (opcional)
        $this->dispatch('focus-codigo')->self();
    }

    public function eliminarMobiliario($codigo)
    {
        // Remover el mobiliario de la lista seleccionada por su código
        $this->mobiliariosSeleccionados = array_filter(
            $this->mobiliariosSeleccionados,
            fn($mobiliario) => $mobiliario['codigo'] !== $codigo
        );
    }
}
