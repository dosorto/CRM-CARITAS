<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Registro de Salida de Migrante</h1>
        <div>

        </div>
    </header>

    <main class="flex flex-grow gap-12 size-full items-center justify-center py-4 overflow-auto">
        <div class="flex flex-col size-full gap-4">

            {{-- Preguntas de Asesoria y Atencion --}}
            <section class="h-3/5 w-full flex">

                <div class="size-full flex flex-col gap-2 justify-center">
                    @foreach ($preguntas as $nombre => $pregunta)
                        <div class="flex w-full">
                            <div class="flex w-3/5">
                                <label class="label font-semibold">{{ $pregunta }}</label>
                            </div>
                            <div class="flex flex-row gap-6 w-2/5">
                                <div class="flex items-center gap-1">
                                    <label class="label font-semibold">Sí</label>
                                    <input type="radio" name="{{ $nombre }}"
                                        wire:model.live="{{ $nombre }}" value="1"
                                        class="radio radio-success border-2 border-gray-400" />
                                </div>
                                <div class="flex items-center gap-1">
                                    <label class="label font-semibold">No</label>
                                    <input type="radio" name="{{ $nombre }}"
                                        wire:model.live="{{ $nombre }}" value="0"
                                        class="radio radio-error border-2 border-gray-400" />
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </section>
            <section class="h-2/5 overflow-y-auto">
                <label class="font-semibold label">
                    Observaciones
                </label>
                <textarea wire:model="Observaciones" class="textarea w-full bg-accent"></textarea>
            </section>
        </div>
        <div class="flex size-full bg-accent p-8 rounded-3xl">

            <div class="flex flex-grow flex-col size-full">
                <div class="flex flex-col size-full overflow-auto">
                    <h2 class="text-center items-center font-bold w-full mb-6 text-xl">
                        Datos del migrante
                    </h2>

                    {{-- Datos del migrante --}}
                    @foreach ($datosPersonales as $label => $dato)
                        <div class="flex gap-2">
                            <h4 class="font-semibold">{{ $label }}:</h4>
                            <p class="mb-4">{{ $dato }}</p>
                        </div>
                    @endforeach
                </div>

                <hr class="border-2 border-neutral w-full">

                <div class="flex flex-col h-max w-full">
                    <label class="label text-base-content font-semibold">Fecha de Salida: (mes / día / año)</label>
                    <input type="date" class="input bg-neutral" wire:model.live="fechaSalida">
                </div>
            </div>

        </div>
    </main>

    <footer class="flex flex-row h-max w-full justify-between py-4">
        <div class="flex gap-4">
            <livewire:crud.migrantes.salida-migrante.ver-faltas-expediente expedienteId="{{ $expedienteId }}" />
        </div>

        <div class="flex gap-4">
            <button wire:click="cancelar" class="btn btn-accent text-nowrap text-base-content">
                Cancelar
            </button>

            <!-- Botón para abrir el modal -->
            <label for="confirmarSalidaMigrante" class="btn btn-success text-nowrap text-base-content">
                <span class="icon-[bxs--save] size-6"></span>
                Registrar Salida
            </label>


            {{-- <button class="btn btn-success text-nowrap text-base-content">
                <span class="icon-[bxs--save] size-5"></span>
                Guardar
            </button> --}}
        </div>
    </footer>











    {{-- Cuerpo del Modal --}}
    <input type="checkbox" id="confirmarSalidaMigrante" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/5 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-xl font-bold text-center mb-5">¿Seguro que desea registrar la Salida de esta persona?</h3>

            {{-- Contenido --}}
            {{-- <main class="h-max flex flex-col w-full gap-2">
                asdasd
            </main> --}}
            <div class="modal-action">
                <button wire:click="guardarDatosSalida" class="btn btn-success text-base-content">
                    <span class="icon-[fa-solid--check] size-6"></span>
                    Confirmar
                </button>
                <label for="confirmarSalidaMigrante" class="btn btn-error text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>
