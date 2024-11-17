<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-sm btn-warning text-warning-content gap-2 pl-3">
        <span class="icon-[line-md--edit] size-4"></span>
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}-{{ $item->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/3 max-w-5xl bg-neutral">
            <h3 class="text-lg font-bold text-center">Editar Donante</h3>

            {{-- Formulario de edición --}}
            <main class="h-max flex flex-col w-full">
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Nombre del Donante </label>
                    <input wire:model="nombre_donante" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('nombre_donante') {{ $message }} @enderror
                    </div>
                </div>

                {{-- Selección de Tipo de Donante --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Tipo de Donante </label>
                    <select wire:model="tipo_donante_id" class="select bg-accent text-base-content">
                        <option value="">Selecciona un tipo de donante...</option>
                        @foreach ($tipos_donante as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                        @endforeach
                    </select>
                    <div class="mt-1 text-error-content font-bold">
                        @error('tipo_donante_id') {{ $message }} @enderror
                    </div>
                </div>
            </main>

            {{-- Acciones del modal --}}
            <div class="modal-action">
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-md text-gray-400"></span>
                </div>
                <button type="button" wire:click="editItem" class="btn btn-success text-base-content gap-1 pl-3">
                    <span class="icon-[material-symbols--save] size-5"></span>
                    Guardar
                </button>
                <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>

{{-- Script para manejar la apertura y cierre del modal --}}
@script
    <script>
        document.getElementById('{{ $idModal }}-{{ $item->id }}').addEventListener('change', function(event) {
            if (event.target.checked) {
                // Llama a la función `resetForm` del componente para restablecer los valores
                $wire.initForm();
            }
        });

        $wire.on('cerrar-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}-{{ $item->id }}').checked = false;
        });
    </script>
@endscript
