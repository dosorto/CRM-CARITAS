<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="btn btn-accent text-base-content gap-2 pl-3">
        <span class="icon-[material-symbols--add-location-rounded] size-6"></span>
        Añadir
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Crear Donante</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">

                {{-- Contenedor del nombre del donante --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Nombre del Donante </label>
                    <input wire:model="nombre_donante" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('nombre_donante') {{ $message }} @enderror
                    </div>
                </div>

                {{-- Contenedor del tipo de donante --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Tipo de Donante </label>
                    <select wire:model="tipo_donante_id" class="input bg-accent">
                        <option value="">Selecciona un tipo de donante...</option>
                        @foreach ($tiposDonantes as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                        @endforeach
                    </select>
                    <div class="mt-1 text-error-content font-bold">
                        @error('tipo_donante_id') {{ $message }} @enderror
                    </div>
                </div>

            </main>

            {{-- Acción del modal --}}
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
        document.getElementById('{{ $idModal }}').addEventListener('change', function(event) {
            if (event.target.checked) {
                $wire.initForm();
            }
        });

        $wire.on('cerrar-modal', () => {
            document.getElementById('{{ $idModal }}').checked = false;
        });
    </script>
@endscript
