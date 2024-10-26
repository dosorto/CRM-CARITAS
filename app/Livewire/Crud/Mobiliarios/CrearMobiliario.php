<?php

namespace App\Livewire\Crud\Mobiliarios;

use App\Models\Mobiliario;
use App\Models\SubCategoria;
use App\Models\Categoria;
use Illuminate\Support\Collection;
use LivewireUI\Modal\ModalComponent;

class CrearMobiliario extends ModalComponent
{

    public $nombre_mobiliario;
    public $descripcion;
    public $codigo;
    public $estado;
    public $ubicacion;
    public $subcategoria_id;
    public $subcategorias = [];
    public $categoria_id;
    public Collection $categorias;
    public $correlativo = 1;


    public function mount()
    {
        // Cargar las categorías existentes
        $this->categorias = Categoria::all();

        if ($this->categorias->isNotEmpty()) {
            $this->categoria_id = 1;
        }

        // llamar a la función para cargar subcategorías
        // $this->cargarSubcategorias();
    }

    public function updatedCategoriaId()
    {
        // Cargar las subcategorías cuando se selecciona una categoría
        $this->cargarSubcategorias();
    }

    public function cargarSubcategorias()
    {
        if ($this->categoria_id) { // Verifica si hay una categoría seleccionada
            // Cargar las subcategorías correspondientes a la categoría seleccionada
            $this->subcategorias = SubCategoria::where('categoria_id', $this->categoria_id)->get();
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
        $this->codigo = $codigoActual;
    }

    // public function generarCodigo()
    // {

    //     if (!$this->subcategoria_id) {
    //         session()->flash('error', 'Selecciona una Subcategoría'); // Mensaje de error
    //         return; // Detener la ejecución si no hay subcategoría seleccionada
    //     }

    //     if ($this->subcategoria_id) {
    //         $subcategoria = SubCategoria::find($this->subcategoria_id);
    //         $nombreSubcategoria = strtoupper($subcategoria->nombre_subcategoria);
    //         $this->codigo = "CMC-{$nombreSubcategoria}-" . str_pad($this->correlativo, 3, '0', STR_PAD_LEFT);
    //         $this->correlativo++; // Aumentar el correlativo para la próxima vez
    //     }
    // }

    public function crear()
    {
        $nuevo_mobiliario = new Mobiliario;

        $nuevo_mobiliario->nombre_mobiliario = $this->nombre_mobiliario;
        $nuevo_mobiliario->descripcion = $this->descripcion;
        $nuevo_mobiliario->codigo = $this->codigo;
        $nuevo_mobiliario->estado = $this->estado;
        $nuevo_mobiliario->ubicacion = $this->ubicacion;
        $nuevo_mobiliario->subcategoria_id = $this->subcategoria_id;

        $nuevo_mobiliario->save();

        $this->dispatch('mobiliario-creado');

        $this->closeModal();
    }

    public function render()
    {
        $this->cargarSubcategorias();
        $this->dispatch('$refresh')->self();

        return view('livewire.crud.mobiliarios.crear-mobiliario', [
            'categorias' => $this->categorias,
            'subcategorias' => $this->subcategorias,
        ]);
    }
}
