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
                                    <label class="label font-semibold">Si</label>
                                    <input type="radio" name="{{ $nombre }}"
                                        wire:model.live="{{ $nombre }}"
                                        class="radio radio-success border-2 border-gray-400" />
                                </div>
                                <div class="flex items-center gap-1">
                                    <label class="label font-semibold">No</label>
                                    <input type="radio" name="{{ $nombre }}"
                                        wire:model.live="{{ $nombre }}"
                                        class="radio radio-error border-2 border-gray-400" checked />
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
                <textarea class="textarea w-full bg-accent"></textarea>
            </section>
        </div>
        <div class="flex size-full bg-accent p-8 rounded-3xl">
            <div class="flex flex-col size-full overflow-y-auto">


                <h2 class="text-center items-center font-bold w-full mb-6 text-xl">
                    Datos del migrante
                </h2>

                {{-- Datos del migrante --}}
                @foreach ($datosPersonales as $label => $dato)
                    <h4 class="font-semibold">{{ $label }}:</h4>
                    <p class="mb-4">{{ $dato }}</p>
                @endforeach

            </div>
        </div>
    </main>

    <footer class="flex flex-row h-max w-full justify-between py-4">
        <div class="flex gap-4">
            <button wire:click="" class="btn btn-primary text-nowrap text-primary-content">
                <span class="icon-[fluent--clipboard-error-16-filled] size-6"></span>
                Ver Faltas Disciplinarias
            </button>
            <button wire:click="" class="btn btn-primary text-nowrap text-primary-content">
                <span class="icon-[fluent--clipboard-error-16-filled] size-6"></span>
                Añadir Falta Disciplinaria
            </button>
        </div>

        <div class="flex gap-4">
            <button class="btn btn-accent text-nowrap text-base-content">
                Cancelar
            </button>
            <button class="btn btn-success text-nowrap text-base-content">
                <span class="icon-[bxs--save] size-5"></span>
                Registrar
            </button>
        </div>
    </footer>
</div>
