<main class="flex-grow overflow-hidden flex flex-col">

    <section class="flex justify-between my-4 items-center">
        <h2 class="text-lg">
            <strong>Paso 1:</strong> Identificación de la Persona
        </h2>
        <livewire:components.forms.steps :currentStep="1" :steps="4">
    </section>

    <article class="flex-grow overflow-y-auto rounded-lg border-2 border-accent p-6">

        <div class="flex flex-col">
            <strong>Ingrese un número de Identificación (Pasaporte o DNI)</strong>
            <input wire:model="identificacion" class="input mt-2 bg-accent" type="text" placeholder="Ej. 0601200303381">
            {{-- <button class="icon-[material-symbols--help]"></button> --}}
            @error('identificacion')
                <p class="text-error">{{ $message }}</p>
            @enderror
        </div>

    </article>

    <footer class="py-4 flex gap-4 justify-between">
        <livewire:crud.migrantes.listado-migrantes-button />
        <livewire:components.buttons.next-step-button />
    </footer>
</main>