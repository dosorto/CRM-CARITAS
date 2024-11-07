<?php

namespace App\Livewire\Crud\Fronteras;

use App\Livewire\Components\ContentTable;
use App\Models\Pais;
use App\Models\Departamento;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class EditarFronteraModal extends Component
{
    public $item;
    public $Frontera;

    // Select de Paises
    public $idPais;
    public $paises;

    // Select de Departamentos
    public $idDepartamento;
    public $departamentos;

    public $idModal;

    public function mount($parameters)
    {
        $this->paises = Pais::select('id', 'nombre_pais')->get();
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }


    public function render()
    {
        return view('livewire.crud.fronteras.editar-frontera-modal');
    }

    public function  editItem()
    {
        $validated = $this->validate([
            'Frontera' => 'required',
            'idDepartamento' => 'required',
        ]);

        $frontera = $this->item;
        $frontera->frontera = $validated['Frontera'];
        $frontera->departamento_id = $validated['idDepartamento'];
        $frontera->save();

        $this->dispatch('update-delete-modal', id: $frontera->id)->to(EliminarFronteraModal::class);

        $this->dispatch('item-edited')->to(ContentTable::class);

        $this->dispatch('close-modal')->self();
    }

    public function updatedIdPais()
    {
        // Actualiza el listado de departamentos basado en el país seleccionado
        $this->departamentos = Departamento::select('id', 'nombre_departamento')
            ->where('pais_id', $this->idPais)
            ->get();

        if ($this->departamentos->isNotEmpty()) {
            $this->idDepartamento = $this->departamentos[0]->id;
        } else {
            $this->idDepartamento = null;
        }
    }

    public function actualizarDepartamentos() {}

    public function resetForm()
    {
        $this->Frontera = $this->item->frontera;
        $this->idPais = $this->item->departamento->pais->id;
        $this->idDepartamento = $this->item->departamento->id;
        $this->departamentos = Departamento::select('id', 'nombre_departamento')
            ->where('pais_id', $this->idPais)
            ->get();
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }
}
