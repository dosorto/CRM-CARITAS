<?php

namespace App\Livewire\Crud\Mobiliarios;

use App\Models\Mobiliario;
use App\Models\SubCategoria;
use App\Models\Categoria;
use Livewire\Component;
use Illuminate\Support\Collection;

class CrearMobiliarioModal extends Component
{
    public $Nombre;
    public $Descripcion;
    public $Codigo;
    public $Estado;
    public $Ubicacion;
    public $IdSubcategoria;
    public $subcategorias = [];
    public $IdCategoria;
    public Collection $categorias;
    public $correlativo = 1;
    public $idModal;


    public function mount($idModal)
    {
        // Cargar las categorías existentes
        

        $this->idModal = $idModal;

        // llamar a la función para cargar subcategorías
        // $this->cargarSubcategorias();
    }

    public function initForm()
    {
        $this->categorias = Categoria::all();

        if ($this->categorias->isNotEmpty()) {
            $this->IdCategoria = 1;
        }
        $this->Nombre = '';
        $this->Descripcion = '';
        $this->Codigo = '';
        $this->Estado = '';
        $this->Ubicacion = '';
    }

    public function updatedCategoriaId()
    {
        // Cargar las subcategorías cuando se selecciona una categoría
        $this->cargarSubcategorias();
    }

    public function cargarSubcategorias()
    {
        if ($this->IdCategoria) { // Verifica si hay una categoría seleccionada
            // Cargar las subcategorías correspondientes a la categoría seleccionada
            $this->subcategorias = SubCategoria::where('categoria_id', $this->IdCategoria)->get();
        } else {
            $this->subcategorias = []; // Reiniciar las subcategorías si no hay categoría seleccionada
        }
    }

    public function generarCodigo()
    {
        // Inicializar el correlativo base
        $baseCodigo = "PSCCH-";
        $this->correlativo = 1; // Reiniciar el correlativo para el nuevo código

        // Verificar si el código ya existe y encontrar el siguiente correlativo disponible
        do {
            // Generar el código actual
            $codigoActual = $baseCodigo . str_pad($this->correlativo, 6, '0', STR_PAD_LEFT);

            // Verificar si ya existe en la base de datos
            $codigoExistente = Mobiliario::where('codigo', $codigoActual)->exists();

            // Si ya existe, incrementar el correlativo
            if ($codigoExistente) {
                $this->correlativo++;
            }
        } while ($codigoExistente);

        // Asignar el nuevo código generado
        $this->Codigo = $codigoActual;
    }

    public function create()
    {

        $validated = $this->validate([
            'nombre' => 'required',
            'IdSubcategoria' => 'required',
            'codigo' => 'required',
        ]);

        $nuevo_mobiliario = new Mobiliario;

        $nuevo_mobiliario->nombre_mobiliario = $validated['nombre'];
        $nuevo_mobiliario->descripcion = $this->Descripcion;
        $nuevo_mobiliario->codigo = $validated['codigo'];
        $nuevo_mobiliario->estado = $this->Estado;
        $nuevo_mobiliario->ubicacion = $this->Ubicacion;
        $nuevo_mobiliario->subcategoria_id = $validated['IdSubcategoria'];

        $nuevo_mobiliario->save();

        $this->dispatch('cerrar-modal');
        $this->dispatch('item-created');
    }

    public function render()
    {
        $this->cargarSubcategorias();
        $this->dispatch('$refresh')->self();

        return view('livewire.crud.mobiliarios.crear-mobiliario-modal', [
            'categorias' => $this->categorias,
            'subcategorias' => $this->subcategorias,
        ]);
    }
}
