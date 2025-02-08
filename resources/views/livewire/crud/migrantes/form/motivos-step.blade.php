<main class="flex size-full">

    {{-- Checkboxes para motivos de salida del país --}}
    <section class="w-1/2 h-full overflow-auto flex flex-col p-6">
        <label class="font-semibold">Motivos por los que salió del país:</label>


        <div class="w-full input input-sm bg-accent input-bordered flex items-center justify-between my-2">
            <input wire:model.live.debounce.200ms="textoBusquedaMotivos" type="text" class="w-full mr-2"
                placeholder="Buscar..." />
            <span wire:loading.remove wire:target="textoBusquedaMotivos"
                class="icon-[map--search] size-5 text-gray-400"></span>
            <span wire:loading wire:target="textoBusquedaMotivos" class="loading loading-dots loading-sm"></span>
        </div>
        @error('motivosSelected')
            <span class="text-error font-semibold">* {{ $message }}</span>
        @enderror
        <div class="flex flex-col gap-2 overflow-auto p-3 border-2 border-accent rounded-box grow">

            @foreach ($motivosSalidaPais as $motivo)
                <div class="flex gap-3 text-base">
                    <input class="checkbox border-2" type="checkbox" wire:model="motivosSelected"
                        wire:key="motivo-{{ $motivo->id }}" value="{{ $motivo->id }}">
                    <span>{{ $motivo->motivo_salida_pais }}</span>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Checkboxes para motivos de salida del país --}}
    <section class="w-1/2 h-full overflow-auto flex flex-col p-6">
        <label class="font-semibold">Necesidades de la Persona:</label>

        <div class="w-full input input-sm bg-accent input-bordered flex items-center justify-between my-2">
            <input wire:model.live.debounce.200ms="textoBusquedaNecesidades" class="w-full mr-2" type="text"
                placeholder="Buscar..." />
            <span wire:loading.remove wire:target="textoBusquedaNecesidades"
                class="icon-[map--search] size-5 text-gray-400"></span>
            <span wire:loading wire:target="textoBusquedaNecesidades" class="loading loading-dots loading-sm"></span>
        </div>
        @error('necesidadesSelected')
            <span class="text-error font-semibold">* {{ $message }}</span>
        @enderror
        <div class="flex flex-col gap-2 overflow-auto p-3 border-2 border-accent rounded-box grow">
            @foreach ($necesidades as $necesidad)
                <div class="flex gap-3 text-base">
                    <input class="checkbox border-2" type="checkbox" wire:model="necesidadesSelected"
                        wire:key="necesidad-{{ $necesidad->id }}" value="{{ $necesidad->id }}">
                    {{ $necesidad->necesidad }}
                </div>
            @endforeach
        </div>
    </section>
</main>
