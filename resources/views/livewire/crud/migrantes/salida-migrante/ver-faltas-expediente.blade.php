<div>
    {{-- Botón para activar el Modal --}}
    <label for="verFaltasExpediente" class="btn btn-primary text-nowrap text-primary-content">
        <span class="icon-[fluent--clipboard-error-16-filled] size-6"></span>
        Ver Faltas Disciplinarias
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="verFaltasExpediente" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-5xl h-full w-4/5 bg-neutral border-2 border-accent flex flex-col">
            <header>
                {{-- Título del Modal --}}
                <h3 class="text-xl font-bold text-center mb-5">Faltas Disciplinarias</h3>
            </header>

            <main class="h-max flex-grow flex flex-col px-4 overflow-auto">

                @if (!empty($faltas))
                    <div class="items-center justify-center flex flex-col text-center">
                        <h3 class="font-bold text-lg text-success">
                            ¡Historial Limpio!
                        </h3>
                        <p>
                            Esta persona no ha presentado ningún comportamiento inadecuado.
                        </p>
                    </div>
                @else
                    <span class="mb-2 text-center">
                        <b>Nombre: </b>{{ $nombre }} <br>
                        <b>Identificación: </b>{{ $identidad }}
                    </span>

                    <table class="table table-pin-rows">
                        <thead>
                            <tr class="bg-accent text-base">
                                <th>Falta
                                    Disciplinaria</th>
                                <th></th>
                                <th>Gravedad</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="border-b-2 border-accent">
                                <td>
                                    Se durmio tarde como 5 veces seguidas
                                </td>
                                <td class="flex justify-end">
                                    <button class="btn btn-sm btn-primary text-primary-content">
                                        <span class="icon-[mingcute--delete-2-fill] size-4"></span>
                                    </button>
                                </td>
                                <td class="bg-success text-success-content font-bold">
                                    Leve
                                </td>
                            </tr>
                            <tr class="border-b-2 border-accent">
                                <td>
                                    Se niega a colaborar
                                </td>
                                <td class="flex justify-end">
                                    <button class="btn btn-sm btn-primary text-primary-content">
                                        <span class="icon-[mingcute--delete-2-fill] size-4"></span>
                                    </button>
                                </td>
                                <td class="bg-warning text-warning-content font-bold">
                                    Grave
                                </td>
                            </tr>
                            <tr class="border-b-2 border-accent">
                                <td>
                                    Agredió físicamente un infante
                                </td>
                                <td class="flex justify-end">
                                    <button class="btn btn-sm btn-primary text-primary-content">
                                        <span class="icon-[mingcute--delete-2-fill] size-4"></span>
                                    </button>
                                </td>
                                <td class="bg-error text-error-content font-bold">
                                    Muy Grave
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endif
            </main>

            {{-- Footer --}}
            <footer class="modal-action mt-6 flex flex-row items-center">
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-md text-gray-400"></span>
                </div>
                <label for="verFaltasExpediente" class="btn btn-accent text-base-content">Cerrar</label>
            </footer>
        </div>
    </div>

</div>
@script
    <script>
        $wire.on('close-modal', () => {
            // Cerrar el modal desactivando el checkbox
            document.getElementById('verFaltasExpediente').checked = false;
        });
    </script>
@endscript
