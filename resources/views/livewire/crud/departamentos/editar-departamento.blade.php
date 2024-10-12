<x-modal form-action="editar">

    <x-slot name="title">
        Editar Departamento
    </x-slot>

    <x-slot name="content">
        <div class="dark flex gap-4 justify-between">
            <div class="mb-2 w-2/3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamento</label>
                <input type="text" wire:model="nombre_departamento"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escribir aquí..." required />
            </div>
            <div class="mb-2 w-1/3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo</label>
                <input type="text" wire:model="codigo_departamento"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escribir aquí..." required />
            </div>
            <div class="mb-2 w-1/3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pais</label>
                <select wire:model="pais_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option value="">Seleccionar país</option>
                    @foreach($paises as $pais)
                        <option value="{{ $pais->id }}">{{ $pais->nombre_pais }}</option>
                    @endforeach
                </select>
            </div>
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

