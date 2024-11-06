<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="btn btn-accent text-base-content gap-2 pl-3">
        <span class="icon-[mdi--plus-circle] size-6"></span>
        Añadir
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/5 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Añadir Asesor Migratorio</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">

                {{-- Contenedor del nombre del País --}}
                <div class="flex flex-col mt-6">
                    <label class="mb-1"> Asesor Migratorio </label>
                    <input wire:model="Asesor" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('Asesor')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </main>

            <div class="modal-action">
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-md text-gray-400"></span>
                </div>
                <button type="button" wire:click="create" class="btn btn-success text-base-content gap-1 pl-3">
                    <span class="icon-[mdi--plus-circle] size-5"></span>
                    Crear
                </button>
                <button wire:click="closeModal" class="btn btn-accent text-base-content">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close-modal', () => {
            // Cerrar el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}').checked = false;
        });
    </script>
@endscript
