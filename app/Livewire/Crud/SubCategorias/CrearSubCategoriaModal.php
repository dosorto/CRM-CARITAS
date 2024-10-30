<?php

namespace App\Livewire\Crud\SubCategorias;

use App\Livewire\Components\ContentTable;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Livewire\Component;

class CrearSubCategoriaModal extends Component
{
    public $Nombre;
    public $IdCategoria;
    public $categorias;
    public $idModal;

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->categorias = Categoria::select('id', 'nombre_categoria')->get();
        $this->IdCategoria = 1;
    }

    public function render()
    {
        return view('livewire.crud.sub-categorias.crear-sub-categoria-modal');
    }

    public function create()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
            'IdCategoria' => 'required',
        ]);
 
        $nueva_subcategoria = new SubCategoria();
        $nueva_subcategoria->nombre_subcategoria = $validated['Nombre'];
        $nueva_subcategoria->categoria_id = $validated['IdCategoria'];
        $nueva_subcategoria->save();

        $this->closeModal();
        $this->dispatch('item-created')->to(ContentTable::class);
    }

    public function closeModal()
    {
        $this->dispatch('close-modal')->self();
        $this->Nombre = '';
    }
}
