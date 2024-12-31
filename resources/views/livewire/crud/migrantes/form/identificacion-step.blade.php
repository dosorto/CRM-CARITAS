<div class="flex flex-col m-6">
    <label class="p-1 font-semibold">Ingrese un número de Identificación</label>
    <input wire:model.live="identificacion" class="input mt-2 bg-accent" type="text" placeholder="Ej. 0601200303381">
    @error('identificacion')
        <p class="text-error font-semibold">{{ $message }}</p>
    @enderror
</div>
