<?php

namespace App\Livewire\Crud\SubCategorias;

use App\Livewire\Components\ContentTable;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Livewire\Component;

class EditarSubCategoriaModal extends Component
{
    public $item;
    public $Nombre;
    public $IdCategoria;
    public $categorias;
    public $idModal;


    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function editItem()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'IdCategoria' => 'required',
        ]);

        $nueva_subcategoria = $this->item;
        $nueva_subcategoria->nombre_subcategoria = $validated['Nombre'];
        $nueva_subcategoria->categoria_id = $validated['IdCategoria'];
        $nueva_subcategoria->save();

        $this->dispatch('update-delete-modal', id: $nueva_subcategoria->id)->to(EliminarSubCategoriaModal::class);
        $this->dispatch('item-edited')->to(ContentTable::class);
        $this->dispatch('close-modal')->self();
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->Nombre = $this->item->nombre_subcategoria;
        $this->IdCategoria = $this->item->categoria->id;
        $this->categorias = Categoria::select('id', 'nombre_categoria')->get();
    }

    public function render()
    {
        return view('livewire.crud.sub-categorias.editar-sub-categoria-modal');
    }
}
