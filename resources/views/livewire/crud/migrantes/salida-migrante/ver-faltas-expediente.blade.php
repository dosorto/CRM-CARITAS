<div>
    {{-- Botón para activar el Modal --}}
    <label for="verFaltasExpediente" class="btn btn-primary text-nowrap text-primary-content">
        <span class="icon-[fluent--clipboard-error-16-filled] size-6"></span>
        Faltas Disciplinarias
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="verFaltasExpediente" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-5xl min-h-64 size-full bg-neutral border-2 border-accent flex flex-col">



            <header class="w-full">
                <h3 class="text-xl font-bold text-center mb-5">Registro de Conducta</h3>
            </header>

            <main class="h-max flex-grow flex flex-col px-4 overflow-auto text-center">



                @if ($faltasMigrante->isEmpty())
                    <div class="items-center justify-center flex flex-col text-center">
                        <h3 class="font-bold text-lg text-success">
                            ¡Historial Limpio!
                        </h3>
                        <p>
                            Esta persona no ha presentado ningún comportamiento inadecuado.
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

            <footer class="modal-action mt-6 flex flex-row items-center justify-between">

                <a class="btn btn-warning" href="#">
                    <span class="icon-[iconamoon--link-external-bold] size-5"></span>
                    Administrar
                </a>

                <label for="verFaltasExpediente" class="btn btn-accent text-base-content">
                    Cerrar
                </label>
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
