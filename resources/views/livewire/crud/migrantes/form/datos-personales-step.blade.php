<main class="mx-7 my-6 flex flex-col gap-5">

    {{-- <button wire:click="validateDatosPersonales" class="btn btn-xs"> test errors </button> --}}

    {{-- Nombres y Apellidos --}}
    <div class="flex gap-12">
        <div class="flex flex-col w-1/2">
            <label class="label p-1 font-semibold">Nombres: </label>
            <div class="input input-bordered flex items-center gap-2 bg-accent pl-3">
                <span class="icon-[ion--person-circle-sharp] size-6"></span>
                <input wire:model="nombres" type="text" class="grow" placeholder="Escribir aquí..." />
                @error('nombres')
                    <span class="icon-[bx--error] size-6 text-error"></span>
                @enderror
            </div>
            @error('nombres')
                <span class="font-semibold text-error text-sm mt-0.5">* {{ $message }} </span>
            @enderror
        </div>
        <div class="flex flex-col w-1/2">
            <label class="label p-1 font-semibold">Apellidos: </label>
            <div class="input input-bordered flex items-center gap-2 bg-accent pl-3">
                <span class="icon-[ion--person-circle-sharp] size-6"></span>
                <input wire:model="apellidos" type="text" class="grow" placeholder="Escribir aquí...">
                @error('apellidos')
                    <span class="icon-[bx--error] size-6 text-error"></span>
                @enderror
            </div>
            @error('apellidos')
                <span class="font-semibold text-error text-sm mt-0.5">* {{ $message }} </span>
            @enderror
        </div>
    </div>

    <div class="flex gap-12 w-full">
        <div class="flex flex-col w-1/2">
            <label class="label p-1 font-semibold">Estado Civil: </label>
            <div class="input input-bordered flex items-center bg-accent pl-3 pe-4">
                <span class="icon-[ion--people-circle] size-6"></span>
                <select wire:model="estadoCivil"
                    class="h-full text-base pl-1 grow bg-accent focus:outline-none focus:border-none border-x-0 rounded-none">
                    <option value="">Seleccione...</option>
                    <option>Casado/a</option>
                    <option>Soltero/a</option>
                    <option>Divorciado/a</option>
                    <option>Viudo/a</option>
                    <option>Unión Libre</option>
                </select>
                @error('estadoCivil')
                    <span class="icon-[bx--error] size-6 text-error ms-2"></span>
                @enderror
            </div>
            @error('estadoCivil')
                <span class="font-semibold text-error text-sm mt-0.5">* {{ $message }} </span>
            @enderror
        </div>
        <div class="flex flex-col w-1/2">
            <label class="label p-1 font-semibold">Fecha de Nacimiento: </label>
            <div class="input input-bordered flex items-center gap-2 bg-accent pl-3 pe-2">
                <span class="icon-[f7--calendar-circle-fill] size-6"></span>
                <input wire:model="fechaNacimiento" type="date" class="grow bg-accent"
                    placeholder="Escribir aquí...">
                @error('fechaNacimiento')
                    <span class="icon-[bx--error] size-6 text-error mr-2"></span>
                @enderror
            </div>
            @error('fechaNacimiento')
                <span class="font-semibold text-error text-sm mt-0.5">* {{ $message }} </span>
            @enderror
        </div>
    </div>



    <div class="flex gap-12">
        <div class="flex flex-col w-1/2">
            <label class="label p-1 font-semibold">País de Origen: </label>
            <div class="input input-bordered flex items-center bg-accent pl-3 pe-4">
                <span class="icon-[material-symbols--flag-circle-rounded] size-6"></span>
                <select wire:model="idPais"
                    class="h-full text-base pl-1 grow bg-accent focus:outline-none focus:border-none border-x-0 rounded-none">
                    <option value="">Seleccione...</option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}">{{ $pais->nombre_pais }}</option>
                    @endforeach
                </select>
                @error('idPais')
                    <span class="icon-[bx--error] size-6 text-error ms-2"></span>
                @enderror
            </div>
            @error('idPais')
                <span class="font-semibold text-error text-sm mt-0.5">* {{ $message }} </span>
            @enderror
        </div>


        <div class="flex flex-col w-1/2">
            <label class="label p-1 font-semibold">Tipo de Sangre: </label>
            <div class="input input-bordered flex items-center bg-accent pl-3 pe-4">
                <span class="icon-[material-symbols--bloodtype-rounded] size-6"></span>
                <select wire:model="tipoSangre"
                    class="h-full text-base pl-1 grow bg-accent focus:outline-none focus:border-none border-x-0 rounded-none">
                    <option value="">Seleccione...</option>
                    <option>O+</option>
                    <option>O-</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                    <option>Desconocido</option>
                </select>
                @error('tipoSangre')
                    <span class="icon-[bx--error] size-6 text-error ms-2"></span>
                @enderror
            </div>
            @error('tipoSangre')
                <span class="font-semibold text-error text-sm mt-0.5">* {{ $message }} </span>
            @enderror
        </div>
    </div>



    <div class="flex gap-12">
        <div class="flex flex-col w-1/2 gap-2 border-2 border-accent rounded-box p-4">
            <label class="label p-1 font-semibold">Sexo: </label>

            <div class="flex gap-8">
                <div class="flex h-max items-center gap-2">
                    <input wire:model="sexo" value="M" type="radio" class="radio border-2" name="sex">
                    <label>Masculino</label>
                </div>
                <div class="flex h-max items-center gap-2">
                    <input wire:model="sexo" value="F" type="radio" class="radio border-2" name="sex">
                    <label>Femenino</label>
                </div>
                @error('sexo')
                    <span class="icon-[bx--error] size-6 text-error ms-2"></span>
                @enderror
            </div>
            @error('sexo')
                <span class="font-semibold text-error text-sm mt-1">* {{ $message }}. </span>
            @enderror

        </div>

        <div class="flex flex-col w-1/2 gap-2 border-2 border-accent rounded-box p-4">
            <label class="label p-1 font-semibold">¿Esta persona pertenece a la comunidad LGBTQI+? </label>

            <div class="flex gap-8">
                <div class="flex h-max items-center gap-2">

                    <input wire:model="esLGBT" value="1" type="radio" class="radio border-2" name="esLGBT">
                    <label>Si</label>
                </div>
                <div class="flex h-max items-center gap-2">
                    <input wire:model="esLGBT" value="0" type="radio" class="radio border-2" name="esLGBT"
                        checked>
                    <label>No</label>
                </div>
                @error('esLGBT')
                    <span class="icon-[bx--error] size-6 text-error ms-2"></span>
                @enderror
            </div>
            @error('esLGBT')
                <span class="font-semibold text-error text-sm mt-1">* {{ $message }}. </span>
            @enderror
        </div>
    </div>
</main>
