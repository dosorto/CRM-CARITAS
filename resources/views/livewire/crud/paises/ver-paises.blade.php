<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y cosa extra --}}
    <header class="h-[10%] flex justify-between items-center border-b-2 border-gray-300">
        <h1 class="text-xl font-bold">Paises</h1>
        <div>
            Apartados Extra
        </div>
    </header>
    <div class="flex flex-col h-[90%]">
        <main class="flex-grow overflow-hidden">
            <div class="h-full flex flex-col">

                {{-- Contenedor encima de la tabla --}}
                <section class="flex justify-between py-4">

                    {{-- Buscador --}}
                    <div class="join w-[55%]">
                        <select wire:model.live="atributo" class="select join-item w-min bg-accent">
                            <option value="Nombre">Nombre</option>
                            <option value="CodigoAlfa3">Código Alfa 3</option>
                            <option value="CodigoNumerico">Código Numérico</option>
                        </select>
                        <label
                            class=" w-full input join-item bg-neutral border-2 border-accent input-bordered flex items-center justify-between gap-2">
                            <input wire:model.live="texto_a_buscar" placeholder="Buscar..." type="text" />
                            <span class="icon-[map--search] size-5 text-gray-400"></span>
                        </label>
                    </div>

                    {{-- Botones --}}
                    <div class="join w-[45%] flex justify-end gap-4">
                        <button wire:click="limpiarFiltros" class="btn btn-accent text-base-content">
                            <span class="icon-[mingcute--broom-line] size-6"></span>
                            <p>
                                Limpiar Filtro
                            </p>
                        </button>
                        <livewire:crud.paises.crear-pais-modal />
                    </div>

                </section>

                {{-- Tabla --}}
                <article class="flex-grow overflow-y-auto rounded-lg border-2 border-accent">
                    <table class="table table-pin-rows">
                        <thead class="text-base">
                            <tr class="border-b border-l border-accent bg-accent">
                                <th>Nombre del País</th>
                                <th>Código ISO Alfa 3</th>
                                <th>Código ISO Numérico</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-base">
                            @foreach ($paises as $pais)
                                <tr class="border border-accent">
                                    <td>{{ $pais->nombre_pais }}</td>
                                    <td>{{ $pais->codigo_alfa3 }}</td>
                                    <td>{{ $pais->codigo_numerico }}</td>
                                    <td>
                                        Botones
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </article>
            </div>
        </main>
        <footer class="mt-auto h-auto py-4">
            {{ $paises->links() }}
        </footer>
    </div>
</div>
