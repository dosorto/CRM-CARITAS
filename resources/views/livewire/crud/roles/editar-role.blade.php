{{-- El encabezado y el <form> del modal se encuentra en la carpeta --}}
{{-- resources/views/components/modal.blade.php --}}

{{-- con form-action le indicamos al componente padre la accion que realizaremos con el formulario --}}
<x-modal form-action="editar">

    <x-slot name="title">
        Editar Rol
    </x-slot>

    <x-slot name="content">
        <div class="dark flex gap-4 justify-between">
            <div class="mb-2 w-2/3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de rol</label>
                <input type="text" wire:model="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escribir aquí..." required />
            </div>
           {{-- <div class="flex items-center">
                <input checked id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">permiso1</label>
            </div> --}}
        </div>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex gap-4 mt-4 ml-2">
            <button type="submit" class="bg-slate-700 hover:bg-slate-600 text-white py-2 px-5 rounded">Guardar</button>
            <button wire:click="$dispatch('closeModal')" type="reset"
                class="bg-red-900 hover:bg-red-800 text-white py-2 px-5 rounded">Cancelar</button>
        </div>
    </x-slot>

</x-modal>
