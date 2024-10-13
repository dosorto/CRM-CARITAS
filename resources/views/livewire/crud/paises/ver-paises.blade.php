<div class="dark">
    <div class="dark:text-gray-300">

        {{-- Titulo --}}
        <div class="w-full flex justify-center mb-6">
            <h1 class="text-2xl font-bold">
                Países
            </h1>
        </div>

        {{-- Contenedor justo encima de la tabla --}}
        <div class="pb-5 flex w-full">

            {{-- Buscador Dinamico --}}
            <div class="flex w-4/6">

                {{-- label del buscador, aquí iría el <select> para filtros en otros modelos --}}
                <div class="relative w-3/12">
                    <p
                        class="hover:bg-gray-300 bg-gray-200 border border-gray-300 text-sm rounded-s-lg border-s-gray-100 dark:border-s-gray-700 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        Nombre del País
                    </p>
                </div>

                {{-- Input y Botón de busqueda --}}
                <div class="relative w-9/12">
                    {{-- wire:model.live actualiza la variable texto_busqueda constantemente --}}
                    <input type="text" wire:model.live="texto_busqueda"
                        class="h-full ps-4 text-sm text-gray-900 border-y border-gray-300 w-full bg-gray-50 focus:ring-gray-500 focus:border-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Buscar...">
                </div>

                {{-- Ícono de Búsqueda de la derecha --}}
                <div class="relative w-[50px]">
                    <div
                        class="flex justify-center items-center h-full w-full rounded-e-lg hover:bg-gray-300 bg-gray-200 border border-gray-300 text-gray-900 text-sm border-s-gray-100 dark:border-s-gray-700 focus:ring-blue-500 focus:border-blue-500 p-2 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <label for="table-search" class="sr-only">Search Icon</label>

                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                </div>

            </div>

            {{-- Boton Añadir Registro --}}
            <div class="flex justify-end items-center w-2/6">
               
                <button wire:click=" $dispatch('openModal', {component: 'crud.paises.crear-pais'})"
                    class="inline-flex items-center pl-3 pr-4 py-2 text-sm font-medium text-gray-900 bg-gray-50 border border-gray-300 rounded hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-1 focus:ring-blue-600 focus:text-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                            clip-rule="evenodd" />
                    </svg>
                    Añadir
                </button>
            </div>
        </div>


        {{-- Contenedor principal de la tabla --}}

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            País
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Código ISO 3
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Código Numérico
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>

                {{-- Cuerpo de la Tabla --}}
                <tbody>
                    <div>
                        @foreach ($datos as $item)
                            <div wire:key="{{ $item->id }}">

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                    <td class="px-6 py-3">
                                        {{ $item->nombre_pais }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $item->codigo_alfa3 }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $item->codigo_numerico }}
                                    </td>

                                    {{-- Botones de Acciones --}}
                                    <td class="px-6 py-3 flex gap-2">
                                        <div>
                                            {{-- Boton Editar --}}
                                            <button type="button" {{-- Con este evento del boton se invoca el modal de Editar --}}
                                                wire:click=" 
                                                $dispatch(
                                                    'openModal', { 
                                                            component: 'crud.paises.editar-pais', 
                                                            arguments: { id: {{ $item->id }} }}
                                                    )"
                                                class="text-gray-800 dark:text-white bg-amber-300 hover:bg-yellow-300 focus:bg-amber-400 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center me-2 dark:bg-slate-700 dark:hover:bg-slate-600 dark:focus:bg-zinc-700">

                                                <svg class="w-5 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.8"
                                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                </svg>
                                                <span class=" text-xs">
                                                    Editar
                                                </span>
                                            </button>

                                            {{-- Boton Eliminar --}}
                                            <button type="button" wire:click=" 
                                            $dispatch(
                                                'openModal', { 
                                                        component: 'crud.paises.eliminar-pais', 
                                                        arguments: { id: {{ $item->id }} }}
                                                )"
                                                class=" bg-red-600 hover:bg-red-500 focus:bg-red-700 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center me-2 dark:bg-red-800 dark:hover:bg-red-700 dark:focus:bg-red-900">
                                                <svg class="w-5 h-4 text-gray-200 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.8"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </div>
                        @endforeach
                    </div>
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        <div class="dark size-full mt-4">
            {{ $datos->links() }}
        </div>
    </div>
</div>
