<main class="flex size-full">
    {{-- Checkboxes para discapacidades --}}
    <section class="w-1/2 h-full overflow-auto flex flex-col p-6">
        <label class="font-semibold">Marque las discapacidades que presenta:</label>


        <div class="w-full input input-sm bg-accent input-bordered flex items-center justify-between my-2">
            <input wire:model.live.debounce.200ms="textoBusquedaDiscapacidades" type="text" class="w-full mr-2"
                placeholder="Buscar..." />
            <span wire:loading.remove wire:target="textoBusquedaDiscapacidades"
                class="icon-[map--search] size-5 text-gray-400"></span>
            <span wire:loading wire:target="textoBusquedaMotivos" class="loading loading-dots loading-sm"></span>
        </div>
        @error('discapacidadesSelected')
            <span class="text-error font-semibold">* {{ $message }}</span>
        @enderror
        <div class="flex flex-col gap-2 overflow-auto p-3 border-2 border-accent rounded-box grow">

            @foreach ($discapacidades as $discapacidad)
                <div class="flex gap-3 text-base">
                    <input class="checkbox border-2" type="checkbox" wire:model.live="discapacidadesSelected"
                        wire:key="discapacidad-{{ $discapacidad->id }}" value="{{ $discapacidad->id }}">
                    <span>{{ $discapacidad->discapacidad }}</span>
                </div>
            @endforeach
        </div>
    </section>
    <section class="w-1/2 h-full overflow-auto flex flex-col justify-end p-6">
        {{-- Observación --}}
        <label class="p-1 font-semibold">Observación</label>
        <textarea wire:model.live="observacion" class="textarea textarea-bordered bg-accent" placeholder="Escribir aquí..."></textarea>

        {{-- Fecha de Salida --}}
        <label class="p-1 font-semibold mt-4">Fecha de Ingreso:</label>
        <div class="input input-bordered flex items-center gap-2 bg-accent pl-3 pe-2">
            <span class="icon-[f7--calendar-circle-fill] size-6"></span>
            <input wire:model.live="fechaIngreso" type="date" class="grow bg-accent" placeholder="Escribir aquí...">
            @error('fechaIngreso')
                <div class="tooltip tooltip-left tooltip-error flex items-center" data-tip="{{ $message }}">
                    <span class="icon-[bx--error] size-6 text-error mr-2"></span>
                </div>
            @enderror

        </div>
    </section>
</main>
