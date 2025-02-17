<main class="flex flex-row gap-8 m-6">
    <div class="flex flex-col w-3/5">
        <label class="label p-2 font-semibold">Ingrese un número de identificación:</label>
        <div @class([
            'input input-bordered flex items-center gap-2 bg-accent pl-3',
            'border-b-4 border-b-error' => $errors->has('identificacion'),
        ])>

            <span class="icon-[heroicons-solid--identification] size-6"></span>
            <input wire:model="identificacion" type="text" class="grow h-full" placeholder="Escribir aquí..." />
            @error('identificacion')
                <div class="tooltip tooltip-left tooltip-error flex items-center" data-tip="{{ $message }}">
                    <span class="icon-[bx--error] size-6 text-error"></span>
                </div>
            @enderror
        </div>


    </div>
    <div class="flex flex-col w-2/5">
        <label class="p-2 font-semibold">Tipo de Identificación:</label>
        <div @class([
            'input input-bordered flex items-center bg-accent pl-3 pe-4',
            'border-b-4 border-b-error' => $errors->has('tipoIdentificacion'),
        ])>
            <span class="icon-[heroicons-solid--identification] size-6"></span>
            <select wire:model="tipoIdentificacion"
                class="h-full text-base pl-1 grow bg-accent focus:outline-none focus:border-none border-x-0 rounded-none">
                <option value="">Seleccione...</option>
                <option>DNI</option>
                <option>Pasaporte</option>
                <option>Acta de Nacimiento</option>
            </select>
            @error('tipoIdentificacion')
                <div class="tooltip tooltip-left tooltip-error flex items-center font-semibold" data-tip="{{ $message }}">
                    <span class="icon-[bx--error] size-6 text-error ms-2"></span>
                </div>
            @enderror
        </div>
    </div>
</main>
