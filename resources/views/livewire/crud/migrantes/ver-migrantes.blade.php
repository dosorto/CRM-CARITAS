<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Migrantes</h1>
        <div>
            Cosas aparte...
        </div>
    </header>

    {{-- Contenedor encima de la tabla --}}
    <section class="flex justify-between py-4 h-max">

        {{-- Buscador --}}
        <div class="w-[55%]">
            <div class="flex">
                <div class="join w-full">
                    <select wire:model.live.debounce.10ms="colSelected" class="select join-item w-min bg-accent">
                        @foreach ($fakeColNames as $key => $value)
                            <option value="{{ $key }}">{{ $key }}</option>
                        @endforeach
                    </select>
                    <label
                        class="w-full input join-item bg-neutral border-2 border-accent input-bordered flex items-center justify-between gap-2">
                        <input wire:model.live.debounce.300ms="textToFind" placeholder="Buscar..." type="text" />

                        {{-- Lógica para mostrar el ícono de carga o el ícono de búsqueda --}}
                        <span wire:loading.remove class="icon-[map--search] size-5 text-gray-400"></span>
                        <span wire:loading class="loading loading-dots"></span>
                    </label>
                </div>
            </div>

        </div>

        {{-- Botones --}}
        <div class="join w-[45%] flex justify-end gap-4">
            <livewire:components.limpiar-filtros />
            <a href="{{ route('registrar-migrante') }}" class="btn btn-accent text-base-content gap-2 pl-3">
                <span class="icon-[mingcute--user-add-2-fill] size-5"></span>
                Registrar
            </a>
        </div>
    </section>

    {{-- Tabla --}}
    <main class="flex-grow overflow-hidden flex flex-col">
        <article class="flex-grow overflow-y-auto rounded-lg border-2 border-accent">
            <table class="table table-sm table-pin-rows w-full">
                <thead class="text-sm">
                    <tr class="border-b border-l border-accent bg-accent">
                        <th> Número de Identificación</th>
                        <th> Nombre Completo</th>
                        <th> Pais </th>
                        <th> Código Familiar </th>
                        <th> Opciones </th>
                    </tr>
                </thead>
                <tbody class="text-base">
                    @foreach ($items as $item)
                        <tr wire:key="{{ $item->id }}" class="border border-accent">

                            <td>
                                {{ $item->numero_identificacion }}
                            </td>
                            <td>
                                {{ $item->primer_nombre .
                                    ' ' .
                                    $item->segundo_nombre .
                                    ' ' .
                                    $item->primer_apellido .
                                    ' ' .
                                    $item->segundo_apelido }}
                            </td>
                            <td>
                                {{ $item->pais->nombre_pais }}
                            </td>
                            <td>
                                {{ $item->codigo_familiar }}
                            </td>

                            {{-- Botones --}}
                            <td class="flex gap-2">
                                <button class="btn btn-warning btn-xs text-base-content" type="button">
                                    <span class="icon-[line-md--edit] size-4"></span>
                                </button>
                                <button class="btn btn-error btn-xs text-base-100" type="button">
                                    <span class="icon-[mingcute--delete-2-fill] size-4"></span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>

        {{-- Footer fijo en el fondo --}}
        <footer class="py-4 border-t border-accent mb-0">
            {{ $items->links() }}
        </footer>
    </main>

</div>
