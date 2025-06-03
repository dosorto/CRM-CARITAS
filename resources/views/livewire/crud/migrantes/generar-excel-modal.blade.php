<article>
    <label class="btn w-full h-full active:scale-95 hover:scale-105 shadow-lg rounded-lg p-0" for="generarExcelModal">
        <div class="card bg-accent rounded-lg w-full">
            <div class="card-body flex flex-row justify-center p-4">
                <div class="flex justify-center items-center">
                    <span class="icon-[icon-park-solid--excel] size-6 text-base-content"></span>
                </div>
                <h2 class="card-title">
                    <p class="text-base-content text-lg items-center justify-center">
                        Generar Registros en Excel
                    </p>
                </h2>
            </div>
        </div>
    </label>
    <input type="checkbox" id="generarExcelModal" class="modal-toggle" checked />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/2 h-max max-w-5xl bg-neutral border-2 border-accent">

            {{-- Título del Modal --}}
            <h3 class="text-xl font-bold text-center mb-4">Seleccione cuantos registros desea generar en Excel</h3>

            {{-- Contenido --}}
            <main class="flex text-base items-start text-start h-40">
                <section class="flex flex-col gap-2 min-w-max pr-6 border-r-2 border-accent h-full">
                    <div class="flex gap-2 items-center">
                        <input value="all" wire:model.live="tipoRangoFechas" type="radio" class="radio border-2"
                            name="tipoRangoFechas">
                        <label class="label p-1 font-semibold">Todos</label>
                    </div>
                    <div class="flex gap-2 items-center">
                        <input value="month" wire:model.live="tipoRangoFechas" type="radio" class="radio border-2"
                            name="tipoRangoFechas">
                        <label class="label p-1 font-semibold">Mes Actual</label>
                    </div>
                    <div class="flex gap-2 items-center">
                        <input value="day" wire:model.live="tipoRangoFechas" type="radio" class="radio border-2"
                            name="tipoRangoFechas">
                        <label class="label p-1 font-semibold">Hoy</label>
                    </div>
                    <div class="flex gap-2 items-center">
                        <input value="dates" wire:model.live="tipoRangoFechas" type="radio" class="radio border-2"
                            name="tipoRangoFechas">
                        <label class="label p-1 font-semibold">Fechas Específicas</label>
                    </div>
                </section>
                <section class="size-full pl-6 flex flex-col justify-center">
                    @switch($tipoRangoFechas)
                        @case('all')
                        @break

                        @case('month')
                        @break

                        @case('day')
                        @break

                        @case('dates')
                            <label class="font-semibold">Desde:</label>
                            <input wire:model.live="fechaInicio" type="date" class="input input-sm input-accent bg-accent"
                                required />
                            <label class="font-semibold mt-4">Hasta</label>
                            <input wire:model.live="fechaFinal" type="date" class="input input-sm input-accent bg-accent"
                                required />
                        @break

                        @default
                    @endswitch
                </section>

            </main>

            <div class="modal-action">
                <div wire:loading class="h-full flex items-center">
                    <span class="loading loading-spinner loading-md"></span>
                </div>

                <label for="generarExcelModal" class="btn btn-accent">Cancelar</label>
                <button wire:click="generar" for="generarExcelModal" class="btn btn-success">
                    <span class="icon-[icon-park-solid--excel] size-6"></span>
                    Generar
                </button>

            </div>
        </div>
    </div>
</article>
@script
    <script>
        Livewire.on('descargarArchivo', url => {
            window.open(url, '_blank'); // o window.location.href = url;
        });
    </script>
@endscript
