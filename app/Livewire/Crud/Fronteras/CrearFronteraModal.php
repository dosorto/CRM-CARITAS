<?php

namespace App\Livewire\Crud\Fronteras;

use App\Livewire\Components\ContentTable;
use App\Livewire\Crud\Migrantes\Form\DatosMigratoriosStep;
use App\Models\Departamento;
use App\Models\Frontera;
use App\Models\Pais;
use Livewire\Component;

class CrearFronteraModal extends Component
{
    public $Frontera;

    // Select de Paises
    public $idPais = 74;
    public $paises;

    // Select de Departamentos
    public $idDepartamento = 18;
    public $departamentos;

    public $idModal;
    public $buttonLabel;

    public function mount($idModal, $buttonLabel = 'Añadir')
    {
        $this->idModal = $idModal;
        $this->paises = Pais::select('id', 'nombre_pais')
            ->has('departamentos')
            ->get();
        $this->buttonLabel = $buttonLabel;
    }

    public function render()
    {


        $this->departamentos = Departamento::select('id', 'nombre_departamento')
            ->where('pais_id', $this->idPais)->get();

        return view('livewire.crud.fronteras.crear-frontera-modal');
    }

    public function create()
    {
        $validated = $this->validate([
            'Frontera' => 'required',
            'idPais' => 'required|numeric',
            'idDepartamento' => 'required',
        ]);


        $frontera = new Frontera();
        $frontera->frontera = $validated['Frontera'];
        $frontera->departamento_id = $validated['idDepartamento'];
        $frontera->save();

        $this->dispatch('item-created')->to(ContentTable::class);
        $this->dispatch('frontera-created', newId: $frontera->id)->to(DatosMigratoriosStep::class);

        $this->closeModal();
    }

    public function closeModal()
    {
        $this->dispatch('close-modal')->self();
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->Frontera = '';
    }
}
