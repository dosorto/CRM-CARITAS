<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="btn btn-accent text-base-content gap-2 pl-3">
        <span class="icon-[mdi--plus-circle] size-5"></span>
        Añadir
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Añadir Categoría</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">

                {{-- Contenedor del nombre del País --}}
                <div class="flex flex-col mt-6">
                    <label class="mb-1"> Nombre de la Categoría </label>
                    <input wire:model="Name" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('Name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </main>

            <div class="modal-action">
                <div wire:loading class="flex items-center p-3">
                    <span class="loading loading-dots loading-sm size-6 text-gray-500"></span>
                </div>
                <button type="button" wire:click="create" class="btn btn-success text-base-content gap-1 pl-3">
                    <span class="icon-[mdi--plus-circle] size-5"></span>
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
                // Llama a la función `resetForm` del componente para restablecer los valores
                $wire.initForm();
            }
        });

        $wire.on('cerrar-modal', () => {
            // Cerrar el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}').checked = false;
        });
    </script>
@endscript
