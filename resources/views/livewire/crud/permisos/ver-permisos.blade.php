<div>
    <div class="dark:text-gray-300">

        {{-- Titulo --}}
        <div class="w-full flex justify-center mb-6">
            <h1 class="text-2xl font-bold">
                Vista de Permisos
            </h1>
        </div>

        
        {{-- Contenedor principal de la tabla --}}

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Permiso
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
                                        {{ $item->name }}
                                    </td>

                                    {{-- Botones de Acciones --}}
                                    <td class="px-6 py-3 flex gap-2">
                                        
                                    </td>
                                </tr>
                            </div>
                        @endforeach
                    </div>
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        <div class="size-full mt-4">
            {{ $datos->links() }}
        </div>
    </div>
</div>

