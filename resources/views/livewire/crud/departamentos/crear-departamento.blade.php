<x-modal form-action="crear" class="w-auto max-w-md">

    <x-slot name="title">
        Crear Departamento
    </x-slot>

    <x-slot name="content">
        <div class="dark size-full flex-col">

            {{-- Inputs de nombre de Departamento y Código --}}
            <div class="flex w-full mb-4 gap-4">
                <div class="w-2/3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamento</label>
                    <input type="text" wire:model="nombre_departamento"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Escribir aquí..." required />
                </div>
                <div class="w-1/3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
                    <input type="text" wire:model="codigo_departamento"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Escribir aquí..." required />
                </div>
            </div>

            @if ($pais_seleccionado)

                <div class="border border-gray-600 rounded-lg mt-8 p-4 flex-col">

                    <div class="flex justify-center mb-4 text-lg font-bold">
                        País Seleccionado
                    </div>

                    <div class="flex gap-2 mt-2">
                        <p class="font-bold">
                            Nombre del País:
                        </p>
                        <p>
                            {{ $pais->nombre_pais }}
                        </p>
                    </div>

                </div>

                <div class="flex mt-6 justify-center">
                    <button type="button" wire:click="limpiarPais"
                        class="dark:bg-slate-800 dark:hover:bg-gray-600 text-white py-2 px-5 rounded">Cambiar
                        País Seleccionado</button>
                </div>

                {{-- <div class="flex mt-6 justify-center">
                    <button type="submit"
                        class="dark:bg-green-800 dark:hover:bg-green-700 text-white py-2 px-5 rounded">Crear</button>
                </div> --}}
            @else
                <div class="flex-col mb-2 w-full gap-2 items-end">

                    {{-- Buscador --}}
                    <div class="flex-col">
                        <div class="flex justify-start">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">País</label>
                        </div>
                        <div class="flex h-full">
                            <input type="text" wire:model.live="texto_busqueda"
                                class="ps-3 text-sm rounded-s text-gray-900 border-y border-gray-300 w-full bg-gray-50 focus:ring-gray-500 focus:border-gray-900 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Buscar...">

                            {{-- Ícono de Búsqueda de la derecha --}}
                            <div class="relative w-[50px]">
                                <div
                                    class="flex justify-center items-center h-full w-full rounded-e-lg hover:bg-gray-300 bg-gray-200 border border-gray-300 text-gray-900 text-sm border-s-gray-100 dark:border-s-gray-700 focus:ring-blue-500 focus:border-blue-500 p-2 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="table-search" class="sr-only">Search Icon</label>

                                    <svg class="w-[18px] h-[18px] text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-1 -1 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="3" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="overflow-x-auto overflow-y-auto mt-4 rounded-lg max-h-[180px]"
                        style="scrollbar-width: thin; scrollbar-color: #4b5563 #1f2937;">
                        <!-- Ajusta max-h según sea necesario -->
                        <table
                            class="min-w-full text-xs text-left text-gray-500 dark:text-gray-400 border border-gray-700">
                            <thead class="text-xs uppercase bg-gray-100 dark:bg-slate-900 dark:text-gray-400">
                                <tr>
                                    <th class="px-2 py-2">País</th>
                                    <th class="px-2 py-2">Seleccionar</th>

                                </tr>
                            </thead>
                            <tbody>

                                @if ($paises_filtrados->isEmpty())
                                    <tr>
                                        <td colspan="4" class="w-full p-4 text-sm text-center">
                                            No hay resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($paises_filtrados as $pais)
                                        <tr class="bg-white border-b dark:bg-slate-800 dark:border-gray-700">
                                            <td class="px-2 py-2">
                                                {{ $pais->nombre_pais }}
                                            </td>
                                            <td class="px-2 py-2">

                                                <button type="button" title="Seleccionar País"
                                                    wire:click="seleccionar_pais({{ $pais->id }})"
                                                    class="relative group text-white bg-green-800 hover:bg-green-700 focus:bg-green-900 font-medium rounded-lg text-sm px-2 py-2 text-center inline-flex items-center me-2">
                                                    <svg class="w-4 h-4 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="4"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
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
