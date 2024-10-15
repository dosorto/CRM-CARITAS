<x-modal form-action="crear">

    <x-slot name="title">
        Crear Rol
    </x-slot>

    <x-slot name="content">

        <div class="flex gap-4 justify-between">
            <div class="mb-2 w-2/3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del rol</label>
                <input type="text" wire:model="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escribir aquí..." required />
            </div>
            @foreach ($permisos as $permiso)

            <!-- Permission Checkbox -->
            <div class="items-center mb-2">
                <input checked id="checked-checkbox" type="checkbox" wire:model= "permisos_asignados" value="{{ $permiso }}"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ $permiso}} </label>
            </div>
            @endforeach
        </div>

    </x-slot>

    <x-slot name="buttons">

        <div class="flex gap-4 mt-4 ml-2">
            <button type="submit" class="bg-slate-700 hover:bg-slate-600 text-white py-2 px-5 rounded">Crear</button>
            <button wire:click="$dispatch('closeModal')" type="reset"
                class="bg-red-900 hover:bg-red-800 text-white py-2 px-5 rounded">Cancelar</button>
        </div>

    </x-slot>
</x-modal>
