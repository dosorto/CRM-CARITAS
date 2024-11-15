<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="btn btn-sm btn-warning text-warning-content gap-2 pl-3">
        <span class="icon-[line-md--edit] size-4"></span>
    </label>

    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Editar Donación</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">

                {{-- Donante --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Donante </label>
                    <select wire:model="donante_id" class="select bg-accent text-base-content">
                        <option value="">Seleccione un donante...</option>
                        @foreach ($donantes as $donante)
                            <option value="{{ $donante->id }}">{{ $donante->nombre }}</option>
                        @endforeach
                    </select>
                    <div class="mt-1 text-error-content font-bold">
                        @error('donante_id')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Artículo --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Artículo </label>
                    <select wire:model="articulo_id" class="select bg-accent text-base-content">
                        <option value="">Seleccione un artículo...</option>
                        @foreach ($articulos as $articulo)
                            <option value="{{ $articulo->id }}">{{ $articulo->nombre }}</option>
                        @endforeach
                    </select>
                    <div class="mt-1 text-error-content font-bold">
                        @error('articulo_id')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Cantidad de Donación --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Cantidad de Donación </label>
                    <input wire:model="cantidad_donacion" class="input bg-accent" type="number" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('cantidad_donacion')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Fecha de Donación --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Fecha de Donación </label>
                    <input wire:model="fecha_donacion" class="input bg-accent" type="date" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('fecha_donacion')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </main>

            {{-- Acción del modal --}}
            <div class="modal-action">
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-md text-gray-400"></span>
                </div>
                <button type="button" wire:click="editItem" class="btn btn-success text-base-content gap-1 pl-3">
                    <span class="icon-[material-symbols--save] size-5"></span>
                    Guardar
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
            // Cierra el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}').checked = false;
        });
    </script>
@endscript
