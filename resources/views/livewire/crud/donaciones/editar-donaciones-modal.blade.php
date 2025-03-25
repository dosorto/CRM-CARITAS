<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-sm btn-warning text-warning-content gap-2 pl-3">
        <span class="icon-[line-md--edit] size-4"></span>
    </label>

    <input type="checkbox" id="{{ $idModal }}-{{ $item->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Editar Donación</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">

                {{-- Donante --}}
                <div class="flex flex-col mt-6">
                    <label class="mb-1">Donante</label>
                    <select wire:model="id_donante" class="select bg-accent text-base-content">
                        <option value="">Seleccione un donante...</option>
                        @foreach ($donantes as $donante)
                            <option value="{{ $donante->id }}">{{ $donante->nombre_donante }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Artículos Donados --}}
                @foreach ($articulosSeleccionados as $index => $articulo)
                <div class="flex gap-4 mt-6">
                    {{-- Artículo --}}
                    <div class="flex flex-col w-2/3">
                        <label class="mb-1">Artículo Donado</label>
                        <select wire:model="articulosSeleccionados.{{ $index }}.id_articulo" class="select bg-accent text-base-content w-full">
                            <option value="">Seleccione un artículo...</option>
                            @foreach ($articulos as $articuloDisponible)
                                <option value="{{ $articuloDisponible->id }}">{{ $articuloDisponible->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Cantidad --}}
                    <div class="flex flex-col w-1/3">
                        <label class="mb-1">Cantidad</label>
                        <input wire:model="articulosSeleccionados.{{ $index }}.cantidad_donacion" 
                            class="input bg-accent w-full" 
                            type="number" 
                            min="1" 
                            placeholder="Cantidad" />
                    </div>
                </div>
                @endforeach

                {{-- Fecha de Donación --}}
                <div class="flex flex-col mt-6">
                    <label class="mb-1">Fecha de Donación</label>
                    <input wire:model="fecha_donacion" class="input bg-accent" type="date" />
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
                <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        document.getElementById('{{ $idModal }}-{{ $item->id }}').addEventListener('change', function(event) {
            if (event.target.checked) {
                // Llama a la función `initForm` del componente para restablecer los valores
                $wire.initForm();
            }
        });

        $wire.on('cerrar-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}-{{ $item->id }}').checked = false;
        });
    </script>
@endscript
