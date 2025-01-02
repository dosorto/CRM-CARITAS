<main class="flex flex-row gap-8 m-6">
    <div class="flex flex-col w-3/5">
        <label class="p-1 font-semibold">Ingrese un número de identificación:</label>
        <input wire:model="identificacion" class="input input-bordered mt-2 bg-accent" type="text" id="identificacion"
            @if (session('formData.migranteFound')) disabled @endif placeholder="Ej. 0601200303381">
        @error('identificacion')
            <span class="flex gap-1 text-error items-center">
                <p class="font-semibold">* {{ $message }}</p>
            </span>
        @enderror
    </div>
    <div class="flex flex-col w-2/5">
        <label class="p-1 font-semibold">Tipo de Identificación:</label>
        <select wire:model="tipoIdentificacion" class="select select-bordered mt-2 bg-accent" id="tipoIdentificacion">
            <option value="">Seleccione...</option>
            <option>DNI</option>
            <option>Pasaporte</option>
            <option>Acta de Nacimiento</option>
        </select>
        @error('tipoIdentificacion')
            <span class="flex gap-1 text-error items-center">
                <p class="font-semibold">* {{ $message }}</p>
            </span>
        @enderror
    </div>
</main>
