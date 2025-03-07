<div>
    {{-- Botón para activar el Modal --}}
    <label for="verFaltasExpediente-{{ $migrante->id }}" class="btn btn-primary text-nowrap text-primary-content">
        <span class="icon-[fluent--clipboard-error-16-filled] size-6"></span>
        Faltas Disciplinarias
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="verFaltasExpediente-{{ $migrante->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-5xl size-full bg-neutral border-2 border-accent flex flex-col">


            <header class="w-full">
                <h3 class="text-xl font-bold text-center mb-2">{{ $modalTitle }}</h3>
            </header>

            <main class="h-max flex-grow flex flex-col px-4 overflow-auto">

                {{-- PANTALLA PARA ASIGNAR FALTA A UN MIGRANTE --}}
                @if ($pantallaAsignar)

                    <span class="font-semibold text-center">{{ $nombre }} -
                        {{ $migrante->numero_identificacion }}</span>

                    <div class="flex gap-2 my-4">
                        <div class="w-full input input-sm bg-accent input-bordered flex items-center justify-between">
                            <input wire:model.live.debounce.200ms="textoBusquedaFaltas" type="text"
                                class="w-full mr-2" placeholder="Buscar..." />
                            <span wire:loading.remove wire:target="textoBusquedaFaltas"
                                class="icon-[map--search] size-5 text-gray-400"></span>
                            <span wire:loading wire:target="textoBusquedaFaltas"
                                class="loading loading-dots loading-sm"></span>
                        </div>
                        <div class="tooltip tooltip-primary tooltip-left" data-tip="Actualizar Listado de Faltas">
                            <button class="btn btn-sm btn-accent" wire:click="actualizarFaltas">
                                <span class="icon-[mingcute--refresh-3-fill] size-5"></span>
                            </button>
                        </div>
                        <div class="tooltip tooltip-primary tooltip-left text-start"
                            data-tip="Crear Falta Disciplinaria">
                            <livewire:crud.faltas.crear-falta-modal idModal="crearFaltaRegistroSalida" iconSize="5"
                                btnSize="sm" label="" />
                        </div>
                    </div>

                    @error('faltasSelected')
                        <span class="text-error font-semibold">* {{ $message }}</span>
                    @enderror
                    <div class="flex flex-col gap-2 overflow-auto p-3 border-2 border-accent rounded-box grow">

                        @foreach ($faltas as $falta)
                            <div class="flex gap-3 text-base">
                                <input class="checkbox border-2" type="checkbox" wire:model="faltasSelected"
                                    wire:key="falta-{{ $falta->id }}" value="{{ $falta->id }}">
                                <div class="flex w-full justify-between">
                                    <span>{{ $falta->falta }}</span>
                                    <span @class([
                                        'font-bold',
                                        'text-success' => $falta?->gravedad_falta_id == 1,
                                        'text-warning' => $falta?->gravedad_falta_id == 2,
                                        'text-error' => $falta?->gravedad_falta_id == 3,
                                    ])>
                                        {{ $falta?->gravedad->gravedad_falta }}</span>
                                </div>
                            </div>
                            <hr class="border border-accent">
                        @endforeach
                    </div>



                    {{-- PANTALLA DE LISTADO DE FALTAS DEL MIGRANTE --}}
                @else
                    @if ($faltasMigrante->isEmpty())
                        <div class="items-center justify-center flex flex-col text-center">
                            <h3 class="font-bold text-success">
                                ¡Historial Limpio!

                            </h3>
                            <p><br>
                                <b> {{ $nombre }} </b> con número de identificación:
                                <b>{{ $migrante->numero_identificacion }}</b>
                                <br><br>
                                <b>NO</b> tiene faltas disciplinarias registradas, por lo que no ha presentado ningún
                                comportamiento inadecuado.
                            </p>
                        </div>
                    @else
                        <span class="mb-4">
                            <b>Nombre: </b>{{ $nombre }} <br>
                            <b>Identificación: </b>{{ $identidad }}
                        </span>

                        <table class="table table-pin-rows">
                            <thead>
                                <tr class="bg-accent text-base">
                                    <th>Gravedad</th>
                                    <th>Falta Disciplinaria</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($faltasMigrante as $faltaMigrante)
                                    <tr wire:key="faltasMigrante-{{ $faltaMigrante->id }}"
                                        class="border-b-2 border-accent">
                                        <td @class([
                                            'font-bold text-primary-content',
                                            'bg-success' => $faltaMigrante->falta?->gravedad_falta_id == 1,
                                            'bg-warning' => $faltaMigrante->falta?->gravedad_falta_id == 2,
                                            'bg-primary' => $faltaMigrante->falta?->gravedad_falta_id == 3,
                                        ])>
                                            {{ $faltaMigrante->falta?->gravedad->gravedad_falta }}
                                        </td>
                                        <td>
                                            {{ $faltaMigrante->falta?->falta }}
                                        </td>
                                        <td>
                                            {{ optional($faltaMigrante->created_at)->format('d-m-Y') }}
                                        </td>
                                        <td class="flex justify-end">
                                            <label for="confirmarEliminarFalta-{{ $faltaMigrante->id }}"
                                                class="btn btn-sm btn-primary"><span
                                                    class="icon-[mingcute--delete-2-fill] size-4"></span>
                                            </label>
                                        </td>
                                    </tr>

                                    {{-- Cuerpo del modal para eliminar Falta --}}
                                    <div>
                                        <input type="checkbox" id="confirmarEliminarFalta-{{ $faltaMigrante->id }}"
                                            class="modal-toggle" />
                                        <div class="modal" role="dialog">
                                            <div class="modal-box bg-neutral border-2 border-error">
                                                <h3 class="text-lg font-bold text-center">¿Seguro que desea eliminar la
                                                    siguiente falta disciplinaria del historial de esta persona?</h3>
                                                <p class="py-4 text-center font-semibold">
                                                    {{ $faltaMigrante->falta?->falta }}</p>
                                                <div class="modal-action">
                                                    <button class="btn btn-success"
                                                        wire:click="eliminarFalta({{ $faltaMigrante->id }})">
                                                        <span class="icon-[fa-solid--check] size-6"></span>
                                                        Confirmar
                                                    </button>
                                                    <label for="confirmarEliminarFalta-{{ $faltaMigrante->id }}"
                                                        class="btn btn-accent">
                                                        <span class="icon-[f7--xmark] size-6"></span>
                                                        Cancelar
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @endif
            </main>

            <footer class="modal-action mt-6 flex flex-row items-center justify-between">

                @if ($pantallaAsignar)
                    <div class="size-full flex gap-4">
                        <button class="btn btn-accent text-base-content" wire:click="switchPantallaAsignar">
                            <span class="icon-[f7--xmark] size-6"></span>
                            Cancelar
                        </button>
                        <span wire:loading class="loading loading-spinner text-base-content h-full w-8"></span>
                    </div>
                    <button class="btn btn-success" wire:click="asignarFaltas">
                        Asignar
                    </button>
                @else
                    <div class="size-full flex gap-4">
                        <button class="btn btn-primary text-primary-content" wire:click="switchPantallaAsignar">
                            <span class="icon-[mdi--alert-plus] size-6"></span>
                            Añadir Falta Disciplinaria
                        </button>
                        <button class="btn btn-accent" wire:click="actualizarFaltasMigrante">
                            <span class="icon-[mingcute--refresh-3-fill] size-6"></span>
                            Actualizar
                        </button>
                        <span wire:loading class="loading loading-spinner text-base-content h-full w-8"></span>
                    </div>
                    <label for="verFaltasExpediente-{{ $migrante->id }}" class="btn btn-accent text-base-content">
                        Cerrar
                    </label>
                @endif

            </footer>
        </div>
    </div>
</div>
