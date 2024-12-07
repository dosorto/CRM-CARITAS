{{-- <div class="container">
    <h2 class="mb-4">Solicitudes Pendientes</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Tipo de Solicitud</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudesPendientes as $solicitud)
                <tr>
                    <td>{{ ucfirst($solicitud->tipo) }}</td>
                    <td>
                        <!-- Botón de Detalles -->
                        <button wire:click="redirigirDetalles({{ $solicitud->id }}, '{{ $solicitud->tipo }}')"
                            class="btn btn-info btn-sm">Detalles</button>
                        <!-- Botón de Aprobar -->
                        <button wire:click="aprobarSolicitud({{ $solicitud->id }}, '{{ $solicitud->tipo }}')"
                            class="btn btn-success btn-sm">Aprobar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}
<div class="h-screen w-full flex flex-col px-5 pb-6">
    {{-- Título y opciones --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Solicitudes Pendientes</h1>
    </header>

    {{-- Tabla de solicitudes --}}
    <main class="flex-grow overflow-hidden flex flex-col mt-8">
        <article class="flex-grow overflow-y-auto rounded-lg border-2 border-accent">
            <table class="table table-pin-rows w-full table-sm">
                <thead class="text-base">
                    <tr class="border-b border-l border-accent bg-accent">
                        <th>Tipo de Solicitud</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody class="text-base">
                    @foreach ($solicitudesPendientes as $solicitud)
                        <tr class="border border-accent">
                            <td>{{ ucfirst($solicitud->tipo) }}</td>
                            <td class="flex gap-2">
                                <!-- Botón de Detalles -->
                                <button wire:click="redirigirDetalles({{ $solicitud->id }}, '{{ $solicitud->tipo }}')"
                                    class="btn btn-accent btn-sm text-base-content">
                                    <span class="icon-[flowbite--info-circle-solid] size-4"></span>
                                    Detalles
                                </button>
                                <!-- Botón de Aprobar -->
                                <button wire:click="aprobarSolicitud({{ $solicitud->id }}, '{{ $solicitud->tipo }}')"
                                    class="btn btn-success btn-sm text-base-content">
                                    <span class="icon-[ooui--success] size-4"></span>
                                    Aprobar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
    </main>
</div>
