<div class="flex flex-col">
    <strong>Ingrese un número de Identificación (Pasaporte o DNI)</strong>
    <input wire:model="identificacion" class="input mt-2 bg-accent" type="text" placeholder="Ej. 0601200303381">
    @error('identificacion')
        <p class="text-error font-semibold">{{ $message }}</p>
    @enderror
</div>
