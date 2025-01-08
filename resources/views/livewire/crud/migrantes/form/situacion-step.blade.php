<main class="flex-grow flex-col flex">

    <div class="w-full flex flex-grow overflow-y-auto p-6">

        {{-- Frontera, asesor migratorio, y estado migratorio --}}
        <section class="w-1/2 h-full border-r border-accent mr-8 pr-4">
            <label class="label">
                <strong>Seleccione las Necesidades que Presenta:</strong>
            </label>
            @error('necesidadesSelected')
                <p class="font-semibold text-error-content mb-4">* Seleccione al menos una</p>
            @enderror
            <div class="flex flex-col gap-2">
                @foreach ($necesidades as $necesidad)
                    <div class="flex gap-1 text-wrap">
                        <input class="checkbox checkbox-sm" type="checkbox" wire:model.live="necesidadesSelected"
                            value="{{ $necesidad->id }}">
                        {{ $necesidad->necesidad }}
                    </div>
                @endforeach
            </div>

        </section>


        <section class="w-1/2 h-full">
            <label class="label">
                <strong>Seleccione Discapacidades que Presenta:</strong>
            </label>
            <div class="flex flex-col gap-2">
                @foreach ($discapacidades as $discapacidad)
                    <div class="flex gap-1">
                        <input class="checkbox checkbox-sm" type="checkbox" wire:model.live="discapacidadesSelected"
                            value="{{ $discapacidad->id }}">
                        {{ $discapacidad->discapacidad }}
                    </div>
                @endforeach
            </div>

        </section>

    </div>
    <div class="h-max w-full items-center bg-accent px-6 pb-6 pt-2 mt-4">
        <label class="label">
            Observación:
        </label>
        <input wire:model.live="observacion" type="text" class="input w-full bg-neutral"
            placeholder="Escribir aquí...">
    </div>
</main>
