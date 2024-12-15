<div>
    {{-- Botón para activar el Modal --}}


    @if ($botonGrande)
        {{-- Boton Grande --}}
        <label for="verFaltasExpediente-{{ $migranteId }}" class="btn btn-primary text-nowrap text-primary-content">
            <span class="icon-[fluent--clipboard-error-16-filled] size-6"></span>
            Ver Faltas Disciplinarias
        </label>
    @else
        {{-- Boton Pequeño --}}
        <label for="verFaltasExpediente-{{ $migranteId }}" class="btn btn-accent btn-sm text-base-content">
            <span class="icon-[fluent--clipboard-error-16-filled] size-5"></span>
        </label>
    @endif


    {{-- Modal --}}
    <input type="checkbox" id="verFaltasExpediente-{{ $migranteId }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-5xl h-4/5 w-2/3 bg-neutral border-2 border-accent flex flex-col">
            <header>
                {{-- Título del Modal --}}
                <h3 class="text-xl font-bold text-center mb-5">Faltas Disciplinarias</h3>
            </header>

            <main class="h-max flex-grow flex flex-col gap-6 p-4 overflow-auto">

                @if (empty($faltas))
                    <div class="items-center justify-center flex flex-col text-center">
                        <h3 class="font-bold text-lg text-success">
                            ¡Historial Limpio!
                        </h3>
                        <p>
                            Esta persona no ha presentado ningún comportamiento inadecuado.
                        </p>
                    </div>
                @else
                    @foreach ($faltas as $gravedad => $faltasDeGravedad)
                        {{-- Sección de categoría --}}
                        <section class="flex flex-col items-start">
                            <h4
                                class="text-lg font-bold mb-2 
                        {{-- @if ($gravedad === 'Leve') text-success
                        @elseif ($gravedad === 'Grave') text-warning
                        @elseif ($gravedad === 'Muy Grave') text-error
                        @else text-primary @endif --}}
                        ">
                                {{ $gravedad }}
                            </h4>
                            <ul class="list-disc list-inside space-y-1">
                                @forelse ($faltasDeGravedad as $falta)
                                    <li class="text-base">{{ $falta }}</li>
                                @empty
                                    <li class="text-base text-gray-500">No hay faltas registradas.</li>
                                @endforelse
                            </ul>
                        </section>
                    @endforeach
                @endif
            </main>

            {{-- Footer --}}
            <footer class="modal-action mt-6 flex flex-row items-center">
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-md text-gray-400"></span>
                </div>


                <livewire:crud.migrantes.asignar-falta-modal migranteId="{{ $migranteId }}" />

                <label for="verFaltasExpediente-{{ $migranteId }}"
                    class="btn btn-accent text-base-content">Cerrar</label>
            </footer>
        </div>
    </div>

</div>
@script
    <script>
        $wire.on('close-modal', () => {
            // Cerrar el modal desactivando el checkbox
            document.getElementById('verFaltasExpediente-{{ $migranteId }}').checked = false;
        });
    </script>
@endscript
