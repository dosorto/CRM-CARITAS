<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y opciones --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Solicitudes de Traslado</h1>
        <div>
            <a href="{{ route('crear-solicitud-traslado') }}" class="btn btn-accent btn-sm text-base-content h-10">
                <span class="icon-[ic--round-add-circle] size-4"></span>
                Nueva Solicitud
            </a>
        </div>
    </header>

    {{-- Tabla de solicitudes --}}
    <main class="flex-grow overflow-hidden flex flex-col mt-8">
        <article class="flex-grow overflow-y-auto rounded-lg border-2 border-accent">
            <table class="table table-pin-rows w-full table-sm">
                <thead class="text-base">
                    <tr class="border-b border-l border-accent bg-accent">
                        <th> Fecha </th>
                        <th> Solicitante </th>
                        <th> Ubicación Actual </th>
                        <th> Opciones </th>
                    </tr>
                </thead>
                <tbody class="text-base">
                    @foreach ($items as $item)
                        @foreach ($item->mobiliarios as $mobiliario)
                            <tr wire:key="{{ $item->id . '-' . $mobiliario->id }}" class="border border-accent">
                                <td>
                                    {{ $item->created_at->format('d/m/Y') }}
                                </td>
                                <td>
                                    {{ $item->solicitante->nombre . ' ' . $item->solicitante->apellido }}
                                </td>
                                <td>
                                    {{ $mobiliario->ubicacion }}
                                </td>
                                <td class="flex gap-2">
                                    <button wire:click="infoSolicitud({{ $item->id }})"
                                        class="btn btn-accent btn-sm text-base-content">
                                        <span class="icon-[flowbite--info-circle-solid] size-4"></span>
                                        Detalles
                                    </button>

                                    <button x-data
                                        x-on:click.prevent="confirm('¿Estás seguro de que deseas eliminar esta solicitud?') && $wire.eliminarSolicitud({{ $item->id }})"
                                        class="btn btn-error btn-sm text-base-content">
                                        <span class="icon-[mdi--delete-circle-outline] size-4"></span>
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </article>

        {{-- Footer de paginación --}}
        <footer class="py-4 border-t border-accent mb-0">
            {{ $items->links() }}
        </footer>
    </main>
</div>
