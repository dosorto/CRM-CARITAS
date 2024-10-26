<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="btn btn-accent text-base-content gap-2 pl-3">
        <span class="icon-[material-symbols--add-location-rounded] size-6"></span>
        Añadir
    </label>

    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Añadir Departamento</h3>

            <main class="h-max flex flex-col w-full">

                {{-- Contenedor del nombre del Departamento --}}
                <div class="flex flex-col mt-6">
                    <label class="mb-1"> Nombre del Departamento </label>
                    <input wire:model="Nombre" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('Nombre')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Inputs de Codigo de Depto y Pais Seleccionado --}}
                <div class="flex flex-row w-full justify-between mt-6">
                    <div class="w-[47%] flex flex-col">
                        <label class="mb-1">Código</label>
                        <input wire:model="Codigo" class="input bg-accent" type="text"
                            placeholder="Escribir aquí..." />
                        <div class="mt-1 text-error-content font-bold">
                            @error('Codigo')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    {{-- País --}}
                    <div class="w-[47%] flex flex-col">
                        <label class="mb-1">País</label>
                        <select wire:model="IdPais" class="select bg-accent text-base-content">
                            {{-- <option value="">Seleccione...</option> --}}
                            @foreach ($paises as $pais)
                                <option value="{{ $pais->id }}">{{ $pais->nombre_pais }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </main>

            <div class="modal-action">
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-md text-gray-400"></span>
                </div>
                <button type="button" wire:click="create" class="btn btn-success text-base-content gap-1 pl-3">
                    <span class="icon-[material-symbols--add-location-rounded] size-5"></span>
                    Crear
                </button>
                <label for="{{ $idModal }}" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        document.getElementById($idModal).addEventListener('change', function(event) {
            if (event.target.checked) {
                // Llama a la función `resetForm` del componente para restablecer los valores
                $wire.initForm();
            }
        });

        $wire.on('cerrar-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById($idModal).checked = false;
        });
    </script>
@endscript