<div class="h-screen w-full flex flex-col px-6 overflow-hidden">
    {{-- Título y opción de volver --}}
    <header class="flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Crear Solicitud de Traslado</h1>
        <div>
            <a href="{{ route('ver-solicitudes-traslado') }}" class="btn btn-accent btn-sm text-base-content h-10"
                type="button">
                <span class="icon-[ph--user-list-bold] size-6"></span>
                Listado de Solicitudes
            </a>
        </div>
    </header>

    <main class="flex flex-grow flex-row w-full border-2 border-accent mt-8 rounded-lg overflow-hidden min-h-0">

        {{-- Sección izquierda: buscar mobiliario --}}
        <section class="w-3/5 p-4 overflow-y-auto">
            {{-- Formulario para buscar mobiliarios --}}

            <div class="flex px-4 mb-4 mt-2">
                <div class="join w-full flex items-center gap-4">
                    <label class="w-full input input-sm join-item bg-neutral border-2 border-accent input-bordered flex items-center justify-between gap-2">
                        <input wire:model.live="textobusqueda" type="text" class="input bg-accent w-full"
                            placeholder="Buscar por código o nombre...">
                        <span wire:loading.remove class="icon-[map--search] size-8 text-gray-400"></span>
                        <span wire:loading class="loading loading-dots"></span>
                        {{-- </div> --}}
                    </label>
                </div>
            </div>
            {{-- <div class="mt-4"> --}}
            {{-- Tabla de Mobiliarios --}}
            <div class="flex flex-col">
                <div class="rounded-lg border-2 border-accent">
                    <table class="table table-sm w-full table-pin-rows">
                        <thead class="text-sm border-b-2 border-accent">
                            <tr>
                                <th class="bg-accent">Código</th>
                                <th class="bg-accent">Nombre</th>
                                <th class="bg-accent">Ubicación</th>
                                <th class="bg-accent">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataMobiliarios as $mobiliario)
                                {{-- Verifica si cumple con el filtro de búsqueda --}}
                                @if (str_contains($mobiliario['codigo'], $textobusqueda) ||
                                        str_contains($mobiliario['nombre_mobiliario'], $textobusqueda))
                                    <tr wire:key="{{ $mobiliario['id'] }}" class="border-b border-accent">
                                        <td>{{ $mobiliario['codigo'] }}</td>
                                        <td>{{ $mobiliario['nombre_mobiliario'] }}</td>
                                        <td>{{ $mobiliario['ubicacion'] }}</td>
                                        <td class="flex w-max gap-2">
                                            <div class="tooltip" data-tip="Seleccionar">
                                                <button wire:click="agregarMobiliario('{{ $mobiliario['codigo'] }}')"
                                                    class="items-center btn btn-xs btn-accent text-base-content">
                                                    <span
                                                        class="icon-[ic--round-navigate-next] size-4 text-base-content"></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr class="border-b border-accent">
                                    <td colspan="4" class="text-center py-4">
                                        <strong>No se encontraron mobiliarios</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        {{-- Sección derecha: lista de mobiliarios seleccionados --}}
        <section class="w-2/5 h-full p-6 bg-accent flex flex-col">
            <div class="flex flex-col h-full">
                <h3 class="text-center text-base-content font-semibold mb-4">Mobiliarios Seleccionados</h3>
                <hr class="border border-gray-400 mb-4">

                {{-- Lista con mobiliarios seleccionados --}}
                <div class="flex-1 overflow-y-auto">
                    @if (!empty($mobiliariosSeleccionados))
                        <ul>
                            @foreach ($mobiliariosSeleccionados as $mobiliario)
                                <li class="mb-4">
                                    <strong>{{ $mobiliario['nombre_mobiliario'] }}</strong>
                                    ({{ $mobiliario['codigo'] }})
                                    <button wire:click="eliminarMobiliario('{{ $mobiliario['codigo'] }}')"
                                        class="btn btn-sm btn-error ml-4">Eliminar</button>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center">No ha seleccionado ningún mobiliario.</p>
                    @endif
                </div>
            </div>
        </section>
    </main>

    {{-- Botón para crear la solicitud --}}
    <footer class="py-4 text-center">
        <button wire:click="crearSolicitudTraslado" class="btn btn-success w-1/3 text-white"
            @if (empty($mobiliariosSeleccionados)) disabled @endif>
            Crear Solicitud
        </button>
    </footer>
</div>
