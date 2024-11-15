<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="btn btn-accent text-base-content gap-2 pl-3">
        <span class="icon-[material-symbols--add-location-rounded] size-6"></span>
        Añadir Donación
    </label>

    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Crear Donación</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">

                {{-- Contenedor del Donante --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1">Donante</label>
                    <select wire:model="id_donante" class="input bg-accent" required>
                        <option value="">Selecciona un Donante...</option>
                        @foreach ($donantes as $donante)
                            <option value="{{ $donante->id }}">{{ $donante->nombre_donante }}</option>
                        @endforeach
                    </select>
                    <div class="mt-1 text-error-content font-bold">
                        @error('id_donante')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Contenedor de los Artículos --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1">Artículos a Donar</label>
                    @foreach ($articulos as $articulo)
                        <div class="flex items-center mb-2">
                            <input
                                type="checkbox"
                                wire:model="selectedArticulos"
                                value="{{ $articulo->id }}"
                                id="articulo_{{ $articulo->id }}"
                                class="mr-2"
                            />
                            <label for="articulo_{{ $articulo->id }}" class="flex-1">{{ $articulo->nombre }}</label>

                            {{-- Campo de cantidad --}}
                            <input
                                wire:model="cantidad.{{ $articulo->id }}"
                                type="number"
                                placeholder="Cantidad"
                                class="input bg-accent w-20"
                                min="1"
                                :disabled="!in_array($articulo->id, $selectedArticulos)" {{-- Deshabilitado si no está seleccionado --}}
                            />
                        </div>
                    @endforeach
                    <div class="mt-1 text-error-content font-bold">
                        @error('selectedArticulos')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Contenedor de la Fecha --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1">Fecha de la Donación</label>
                    <input
                        wire:model="fecha_donacion"
                        type="date"
                        class="input bg-accent"
                        required
                    />
                    <div class="mt-1 text-error-content font-bold">
                        @error('fecha_donacion')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

            </main>

            {{-- Acción del Modal --}}
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

@push('scripts')
<script>
    // Resetear el formulario al abrir el modal
    document.getElementById('{{ $idModal }}').addEventListener('change', function(event) {
        if (event.target.checked) {
            // Llama a la función `initForm` del componente para restablecer los valores
            $wire.initForm();
        }
    });

    // Cerrar el modal cuando se recibe el evento 'cerrar-modal'
    $wire.on('cerrar-modal', () => {
        document.getElementById('{{ $idModal }}').checked = false;
    });
</script>
@endpush
