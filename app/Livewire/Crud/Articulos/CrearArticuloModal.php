<?php

namespace App\Livewire\Crud\Articulos;

use App\Livewire\Components\ContentTable;
use App\Livewire\Crud\Donaciones\CrearDonacionesModal;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\CategoriaArticulo;
use App\Models\Subcategoria;
use Livewire\Component;

class CrearArticuloModal extends Component
{
    public $nombre;
    public $descripcion;
    public $codigo_barra;
    public $cantidad_stock;
    public $categoria_articulos_id;
    public $categoria_articulos;
    public $idModal;
    public $IdCategoria;

    public function create()
    {
        $validated = $this->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'codigo_barra' => 'required|string|max:255',
            'cantidad_stock' => 'required|integer|min:0',
            'categoria_articulos_id' => 'required|exists:categoria_articulos,id',
        ]);

        $nuevoArticulo = new Articulo();
        $nuevoArticulo->nombre = $validated['nombre'];
        $nuevoArticulo->descripcion = $validated['descripcion'];
        $nuevoArticulo->codigo_barra = $validated['codigo_barra'];
        $nuevoArticulo->cantidad_stock = $validated['cantidad_stock'];
        $nuevoArticulo->categoria_articulos_id = $validated['categoria_articulos_id'];

        $nuevoArticulo->save();

        $this->dispatch('close-modal')->self();

        $this->dispatch('item-created')->to(ContentTable::class);
        //Este evento se envia al modal de Crear Donante Modal para actualizar el select
        $this->dispatch('articulos-created')->to(CrearDonacionesModal::class);
    }

    public function resetForm()
    {
        $this->categoria_articulos = CategoriaArticulo::all();  // Obtener todas las categorías
        $this->nombre = '';
        $this->descripcion = '';
        $this->codigo_barra = '';
        $this->cantidad_stock = '';
        $this->categoria_articulos_id = null;
    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.crud.articulos.crear-articulo-modal');
    }
}
