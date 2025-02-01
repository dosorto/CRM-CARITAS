<div class="h-screen w-full flex flex-col px-5">
    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Registro de Salida de Migrante</h1>
        <button wire:click="cancelar" class="btn btn-sm btn-accent text-base-content">
            <span class="icon-[typcn--cancel] size-5"></span>
            Cancelar
        </button>
    </header>

    <main class="flex flex-grow gap-16 size-full items-center justify-center overflow-auto">
        <section class="flex flex-col h-full w-1/2 gap-4 py-5">

            <div class="h-full w-full flex flex-col overflow-auto ">

                {{-- Preguntas --}}
                @foreach ($preguntas as $nombre => $pregunta)
                    <div @class([
                        'border-b-2 border-dotted flex justify-between gap-2 py-2 px-2 mb-4 border-gray-400',
                        // 'border-success' => $this->{$nombre},
                        // 'border-error' => !$this->{$nombre},
                    ])>
                        <label class="font-semibold">{{ $pregunta }}</label>

                        <input type="checkbox" @class([
                            'toggle',
                            'toggle-success' => $this->{$nombre},
                            'bg-error hover:bg-error' => !$this->{$nombre},
                        ]) wire:model.live="{{ $nombre }}" />

                    </div>
                @endforeach
            </div>
        </section>
        <section class="flex flex-col justify-start h-full w-1/2 py-5 overflow-auto">

            <label class="font-semibold label">
                Observaciones
            </label>
            <textarea wire:model="Observaciones" class="textarea w-full bg-accent"></textarea>


            <label class="label text-base-content font-semibold mt-4">Fecha de Salida</label>
            <input type="date" class="input bg-accent" wire:model.live="fechaSalida">

        </section>
    </main>

    <footer class="flex flex-row h-max w-full justify-between py-4">
        <div class="flex gap-4">
            <livewire:crud.migrantes.salida-migrante.ver-faltas-expediente expedienteId="{{ $expedienteId }}" />
        </div>

        <div class="flex gap-4">
            <!-- Botón para abrir el modal -->
            <label for="confirmarSalidaMigrante" class="btn btn-success text-nowrap">
                <span class="icon-[bxs--save] size-6"></span>
                Registrar Salida
            </label>
        </div>
    </footer>











    {{-- Cuerpo del Modal --}}
    <input type="checkbox" id="confirmarSalidaMigrante" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/5 max-w-5xl bg-neutral border-2 border-primary">

            {{-- Título del Modal --}}
            <h3 class="text-xl font-bold text-center mb-5">¿Seguro que desea registrar la salida de esta persona?</h3>

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
