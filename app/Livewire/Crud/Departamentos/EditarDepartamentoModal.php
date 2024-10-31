<?php

namespace App\Livewire\Crud\Departamentos;

use App\Models\Pais;
use Livewire\Component;
use App\Livewire\Components\ContentTable;

class EditarDepartamentoModal extends Component
{
    public $item;
    public $Nombre;
    public $Codigo;
    public $IdPais;
    public $paises;
    public $idModal;

    // Esta funcion se ejecuta una vez, antes de renderizar el componente,
    // hasta que se recargue toda la pagina, no se vuelve a ejecutar.
    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    // Renderizado de la vista del componente.
    public function render()
    {
        return view('livewire.crud.departamentos.editar-departamento-modal');
    }
 
    // Función para editar el item
    public function editItem()
    {
        // Valida los datos de los inputs ingresados
        $validated = $this->validate([
            // 'wire:model de input' => 'validacion necesaria'
            'Nombre' => 'required',
            'Codigo' => 'required',
            'IdPais' => 'required',
        ]);

        // Lógica para editar el item, se utilizan los valores validados de la variable '$validated' de arriba
        $deptoEdited = $this->item;
        $deptoEdited->nombre_departamento = $validated['Nombre'];
        $deptoEdited->codigo_departamento = $validated['Codigo'];
        $deptoEdited->pais_id = $validated['IdPais'];
        $deptoEdited->save();


        // Se envía un evento con el id del departamento a EliminarDepartamentoModal,
        // para actualizar la información instantáneamente cuando se edite el item en específico.
        $this->dispatch('update-delete-modal', id: $deptoEdited->id)->to(EliminarDepartamentoModal::class);

        // De igual manera, se envía el evento de item-edited a la tabla para que actualice su contenido.
        $this->dispatch('item-edited')->to(ContentTable::class);

        // este evento se envia en este mismo componente y se escucha en la vista con un script, 
        // que cambia el valor del checkbox del modal a 'false', cerrándolo.
        $this->dispatch('close-modal')->self();
    }

    public function resetForm()
    {
        $this->Nombre = $this->item->nombre_departamento;
        $this->Codigo = $this->item->codigo_departamento;
        $this->IdPais = $this->item->pais->id;
        // Esta consulta es más ligera que el ::all(), trae solo lo necesario.
        $this->paises = Pais::select('id', 'nombre_pais')->get();
    }

    // Esta función se ejecuta cuando se presiona "Cancelar", 
    // se resetea el formulario a los últimos valores cargados justo antes de cerrarlo.
    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }
}
