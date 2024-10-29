<?php

namespace App\Livewire\Crud\Paises;

use Livewire\Component;
use App\Livewire\Components\ContentTable;

class EditarPaisModal extends Component
{
    public $Nombre;
    public $Alfa3;
    public $Numerico;
    public $item;
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
        return view('livewire.crud.paises.editar-pais-modal');
    }


    // Función para editar el item
    public function  editItem()
    {
        // Valida los datos de los inputs ingresados
        $validated = $this->validate([
            // 'wire:model de input' => 'validacion necesaria'
            'Nombre' => 'required',
            'Alfa3' => 'required|size:3',
            'Numerico' => 'required|size:3',
        ]);

        // Lógica para editar el item, se utilizan los valores validados de la variable '$validated' de arriba
        $paisEdited = $this->item;
        $paisEdited->nombre_pais = $validated['Nombre'];
        $paisEdited->codigo_alfa3 = $validated['Alfa3'];
        $paisEdited->codigo_numerico = $validated['Numerico'];
        $paisEdited->save();

        // Se envía un evento con el id del pais a ELiminarPaisModal,
        // para actualizar la información instantáneamente cuando se edite el item en específico.
        $this->dispatch('update-delete-modal', id: $paisEdited->id)->to(EliminarPaisModal::class);

        // De igual manera, se envía el evento de item-edited a la tabla para que actualice su contenido.
        $this->dispatch('item-edited')->to(ContentTable::class);

        // este evento se envia en este mismo componente y se escucha en la vista con un script, 
        // que cambia el valor del checkbox del modal a 'false', cerrándolo.
        $this->dispatch('close-modal')->self();
    }

    // Resetea los valores predeterminados del formulario, en este caso de editar,
    // con los valores de item correspondiente al modal.
    public function resetForm()
    {
        $this->Nombre = $this->item->nombre_pais;
        $this->Alfa3 = $this->item->codigo_alfa3;
        $this->Numerico = $this->item->codigo_numerico;
    }

    // Esta función se ejecuta cuando se presiona "Cancelar", 
    // se resetea el formulario a los últimos valores cargados justo antes de cerrarlo.
    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }
}
