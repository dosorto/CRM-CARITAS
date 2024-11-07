<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-sm btn-warning text-warning-content gap-2 pl-3">
        <span class="icon-[line-md--edit] size-4"></span>
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}-{{ $item->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/5 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Editar Frontera</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">

                {{-- Contenedor del nombre de la frontera --}}
                <div class="flex flex-col mt-6">
                    <label class="mb-1"> Frontera </label>
                    <input wire:model="Frontera" class="input bg-accent" type="text"
                        placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('Frontera')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="flex mt-6 gap-4">
                    {{-- Contenedor del nombre del País --}}
                    <div class="flex flex-col w-5/12">
                        <label class="mb-1"> País </label>
                        <select wire:model.live.debounce.100ms="idPais" class="input bg-accent" type="text"
                            placeholder="Escribir aquí...">
                            @foreach ($paises as $pais)
                                <div wire:key="{{ $pais->id }}">
                                    <option value="{{ $pais->id }}"> {{ $pais->nombre_pais }} </option>
                                </div>
                            @endforeach
                        </select>
                        <div class="mt-1 text-error-content font-bold">
                            @error('idPais')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    {{-- Contenedor del nombre del País --}}
                    <div class="flex flex-col w-7/12">
                        <label class="mb-1"> Departamento </label>
                        <select wire:model="idDepartamento" class="input bg-accent" type="text"
                            placeholder="Escribir aquí..." id="idDepartamento" name="idDepartamento">
                            @foreach ($departamentos as $depto)
                                <option value="{{ $depto->id }}"> {{ $depto->nombre_departamento }} </option>
                            @endforeach
                        </select>
                        <div class="mt-1 text-error-content font-bold">
                            @error('idDepartamento')
                                Faltan departamentos...
                            @enderror
                        </div>
                    </div>
                </div>

            </main>

            <div class="modal-action">
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-md text-gray-400"></span>
                </div>
                <button type="button" wire:click="editItem" class="btn btn-success text-base-content gap-1 pl-3">
                    <span class="icon-[material-symbols--save] size-5"></span>
                    Guardar
                </button>
                <button wire:click="closeModal" class="btn btn-accent text-base-content">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}-{{ $item->id }}').checked = false;
        });
    </script>
@endscript
