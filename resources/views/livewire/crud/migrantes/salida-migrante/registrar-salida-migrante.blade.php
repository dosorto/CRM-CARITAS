<div class="h-screen w-full flex flex-col">
    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent p-4">
        <h1 class="text-xl font-bold">Registro de Salida de
            {{ $migrante->primer_nombre . ' ' . $migrante->primer_apellido }}</h1>
        <button wire:click="cancelar" class="btn btn-sm btn-accent text-base-content">
            <span class="icon-[typcn--cancel] size-5"></span>
            Cancelar
        </button>
    </header>

    <main class="flex flex-grow size-full items-center justify-center overflow-auto">
        <section class="flex flex-col h-full w-1/2 gap-4 p-5 pr-8">
            <div class="h-full w-full flex flex-col overflow-auto">

                {{-- Preguntas --}}
                @foreach ($preguntas as $nombre => $pregunta)
                    <div @class([
                        'border-b-2 border-dotted flex justify-between gap-2 py-2 px-2 mb-4',
                        'border-success' => $this->{$nombre},
                        'border-primary' => !$this->{$nombre},
                    ])>
                        <label class="font-semibold">{{ $pregunta }}</label>

                        <div data-tip="No tiene permisos" @class([
                            'h-full flex items-center gap-2',
                            'tooltip tooltip-left tooltip-primary' => !auth()->user()->can('editar-registros-de-asesoria'),
                        ])>
                            <span class="font-semibold">
                                {{ $this->{$nombre} ? 'Sí' : 'No' }}
                            </span>

                            <input type="checkbox" @class([
                                'toggle',
                                'toggle-success' => $this->{$nombre},
                                'bg-primary hover:bg-primary' => !$this->{$nombre},
                            ]) wire:model.live="{{ $nombre }}"
                                @disabled(!auth()->user()->can('editar-registros-de-asesoria')) @checked($this->{$nombre}) />
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="flex flex-col justify-start h-full w-1/2 p-5 pl-8 overflow-auto border-r-2 border-accent">

            {{-- Info Personal --}}
            {{-- <article class="flex p-4 border-4 border-accent rounded-xl mb-5">
                <div class="flex flex-col">
                    <span><b>Nombre:</b> {{ $nombreMigrante }}</span>
                    <span><b>Identificación:</b> {{ $identificacion }}</span>
                </div>
            </article> --}}

            <label class="font-semibold label">
                Observaciones
            </label>
            <textarea wire:model="Observaciones" class="textarea w-full bg-accent"></textarea>


            <label class="label text-base-content font-semibold mt-4">Fecha de Salida</label>
            <input type="date" class="input bg-accent" wire:model.live="fechaSalida">

        </section>

    </main>

    <footer class="flex flex-row h-max w-full justify-between p-4">
        <div class="flex gap-4">
            <livewire:crud.migrantes.salida-migrante.ver-faltas-expediente migranteId="{{ $migrante->id }}" />
            <livewire:crud.migrantes.info-migrante-modal idModal="infoMigranteSalida" iconSize="6" btnSize="md"
                label="Datos Personales" :personaId="$migranteId" />
        </div>

        <div class="flex gap-4">
            <!-- Botón para abrir el modal -->
            <label for="confirmarSalidaMigrante" class="btn btn-success text-nowrap">
                <span class="icon-[mdi--account-arrow-right-outline] size-7"></span>
                Registrar Salida
            </label>
        </div>
    </footer>










    {{-- Cuerpo del Modal --}}
    <input type="checkbox" id="confirmarSalidaMigrante" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/3 max-w-5xl bg-neutral border-2 border-primary">

            {{-- Título del Modal --}}
            <h3 class="text-xl font-bold text-center">
                ¿Seguro que desea registrar la salida de esta persona?
            </h3>


            <div class="text-center flex flex-col gap-4">
                <div class="w-full flex justify-center mt-4">
                    <span class="icon-[ep--warning-filled] size-8 text-warning text-center"></span>
                </div>
                <div class="flex flex-col gap-2">
                    <span>
                        Puede realizar una Encuesta de Satisfacción al migrante sobre los servicios brindados en el
                        centro.
                    </span>
                    <span>
                        Al iniciar la encuesta, su sesión se cerrará temporalmente. Para volver a
                        ingresar al sistema, deberá introducir su contraseña o iniciar sesión con otro usuario.
                    </span>
                </div>
            </div>

            <div class="modal-action flex justify-between">
                <button wire:click="realizarEncuesta" class="btn btn-success">
                    <span class="icon-[fa-solid--check] size-6"></span>
                    Guardar Salida y Realizar Encuesta de Satisfacción
                </button>
                <div class="flex gap-4">
                    <button wire:click="guardarDatosSalida" class="btn btn-info">
                        <span class="icon-[material-symbols--save] size-6"></span>
                        Solo Guardar Salida
                    </button>
                    <label for="confirmarSalidaMigrante" class="btn btn-error">
                        <span class="icon-[f7--xmark] size-6"></span>
                        Cancelar
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
