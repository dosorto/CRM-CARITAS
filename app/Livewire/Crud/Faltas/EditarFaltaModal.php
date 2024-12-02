<?php

namespace App\Livewire\Crud\Faltas;

use App\Livewire\Components\ContentTable;
use App\Models\GravedadFalta;
use Livewire\Component;

class EditarFaltaModal extends Component
{
    public $item;
    public $Falta;
    public $GravedadId;
    public $Gravedades = [];
    public $idModal;

    // Esta funcion se ejecuta una vez, antes de renderizar el componente,
    // hasta que se recargue toda la pagina, no se vuelve a ejecutar.
    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->Falta = $this->item->falta;
        // dd($this->item);
        $this->GravedadId = $this->item->gravedad_falta_id;
        // Esta consulta es más ligera que el ::all(), trae solo lo necesario.
        $this->Gravedades = GravedadFalta::select('id', 'gravedad_falta')->get();
    }

    // Función para editar el item
    public function editItem()
    {
        // Valida los datos de los inputs ingresados
        $validated = $this->validate([
            // 'wire:model de input' => 'validacion necesaria'
            'Falta' => 'required',
            'GravedadId' => 'required',
        ]);


        // Lógica para editar el item, se utilizan los valores validados de la variable '$validated' de arriba
        $faltaEdited = $this->item;
        $faltaEdited->falta = $validated['Falta'];
        $faltaEdited->gravedad_falta_id = $validated['GravedadId'];
        $faltaEdited->save();

        // Se envía un evento con el id del departamento a EliminarDepartamentoModal,
        // para actualizar la información instantáneamente cuando se edite el item en específico.
        $this->dispatch('update-delete-modal', id: $faltaEdited->id)->to(EliminarFaltaModal::class);

        // De igual manera, se envía el evento de item-edited a la tabla para que actualice su contenido.
        $this->dispatch('item-edited')->to(ContentTable::class);

        // este evento se envia en este mismo componente y se escucha en la vista con un script, 
        // que cambia el valor del checkbox del modal a 'false', cerrándolo.
        $this->dispatch('close-modal')->self();
    }

    public function render()
    {
        return view('livewire.crud.faltas.editar-falta-modal');
    }

        // Esta función se ejecuta cuando se presiona "Cancelar", 
    // se resetea el formulario a los últimos valores cargados justo antes de cerrarlo.
    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }
}
