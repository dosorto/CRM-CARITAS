<?php

namespace App\Livewire\Crud\Mobiliarios;

use App\Models\Mobiliario;
use App\Models\SubCategoria;
use App\Models\Categoria;
use Livewire\Component;
use Illuminate\Support\Collection;
use App\Livewire\Components\ContentTable;

class EditarMobiliarioModal extends Component
{
    public $item;
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


    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        if ($this->item->estado === "Bueno") {
            $this->Estado = true;
        }
        else {
            $this->Estado = false;
        }
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->categorias = Categoria::all();

        if ($this->categorias->isNotEmpty()) {
            $this->IdCategoria = 1;
            $this->cargarSubcategorias();
        }
        $this->Nombre = $this->item->nombre_mobiliario;
        $this->Descripcion = $this->item->descripcion;
        $this->Codigo = $this->item->codigo;
        $this->Ubicacion = $this->item->ubicacion;
        $this->IdSubcategoria= $this->item->subcategoria->id;
        $this->IdCategoria= $this->item->subcategoria->categoria->id;
    }

    public function updatedIdCategoria()
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

    public function editItem()
    {

        $validated = $this->validate([
            'Nombre' => 'required',
            'Ubicacion' => 'required|max:10',
        ]);

        if ($this->Estado === true) {
            $estado = 'Bueno';
        }
        else {
            $estado = 'Malo';
        }

        $nuevo_mobiliario = $this->item;

        $nuevo_mobiliario->nombre_mobiliario = $validated['Nombre'];
        $nuevo_mobiliario->descripcion = $this->Descripcion;
        $nuevo_mobiliario->codigo = $this->Codigo;
        $nuevo_mobiliario->estado = $estado;
        $nuevo_mobiliario->ubicacion = $validated['Ubicacion'];
        $nuevo_mobiliario->subcategoria_id = $this->IdSubcategoria;

        $nuevo_mobiliario->save();

        $this->dispatch('update-delete-modal', id: $nuevo_mobiliario->id)->to(EliminarMobiliarioModal::class);
        $this->dispatch('update-info-modal', id: $nuevo_mobiliario->id)->to(InfoMobiliarioModal::class);
        $this->dispatch('close-modal');
        $this->dispatch('item-edited')->to(ContentTable::class);
    }

    public function render()
    {
        $this->cargarSubcategorias();
        $this->dispatch('$refresh')->self();

        return view('livewire.crud.mobiliarios.editar-mobiliario-modal', [
            'categorias' => $this->categorias,
            'subcategorias' => $this->subcategorias,
        ]);
    }
}
