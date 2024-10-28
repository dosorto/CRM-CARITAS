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
    public $idModal;


    public function mount($idModal)
    {
        // Cargar las categorías existentes


        $this->idModal = $idModal;
        $this->initForm();
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
        $this->generarCodigo();
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
        $ultimoMobiliario = Mobiliario::orderBy('codigo', 'desc')->first();

        if ($ultimoMobiliario) {
            $ultimoCorrelativo = $ultimoMobiliario->codigo; // Ejemplo: "PSCCH-000002"
            $numeroCorrelativo = intval(substr($ultimoCorrelativo, 6)); // Extrae "000002" y lo convierte a entero: 2
        } else {
            $numeroCorrelativo = 0; // Si no hay registros, empezará desde 0
        }

        $nuevoNumeroCorrelativo = str_pad($numeroCorrelativo + 1, 6, '0', STR_PAD_LEFT);
        $this->Codigo = "PSCCH-" . $nuevoNumeroCorrelativo; // Genera "PSCCH-000003"
    }

    public function create()
    {

        $validated = $this->validate([
            'Nombre' => 'required',
            'Ubicacion' => 'required|max:10',
        ]);

        if ($this->Estado === "") {
            $estado = 'Bueno';
        }
        else {
            $estado = 'Malo';
        }
        
        $nuevo_mobiliario = new Mobiliario;

        $nuevo_mobiliario->nombre_mobiliario = $validated['Nombre'];
        $nuevo_mobiliario->descripcion = $this->Descripcion;
        $nuevo_mobiliario->codigo = $this->Codigo;
        $nuevo_mobiliario->estado = $estado;
        $nuevo_mobiliario->ubicacion = $validated['Ubicacion'];
        $nuevo_mobiliario->subcategoria_id = $this->IdSubcategoria;

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
