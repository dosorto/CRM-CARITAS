<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="btn btn-sm btn-warning text-warning-content gap-2 pl-3">
        <span class="icon-[line-md--edit] size-4"></span>
    </label>

    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Editar Artículo</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">

                {{-- Nombre del artículo --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Nombre del Artículo </label>
                    <input wire:model="nombre" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('nombre')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Descripción --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Descripción </label>
                    <textarea wire:model="descripcion" class="textarea bg-accent" placeholder="Escribir aquí..."></textarea>
                    <div class="mt-1 text-error-content font-bold">
                        @error('descripcion')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Código de barras --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Código de Barras </label>
                    <input wire:model="codigo_barra" class="input bg-accent" type="text"
                        placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('codigo_barra')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Cantidad en stock --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Cantidad en Stock </label>
                    <input wire:model="cantidad_stock" class="input bg-accent" type="number"
                        placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('cantidad_stock')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Subcategorías --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Subcategoría </label>
                    <select wire:model="subcategoria_id" class="select bg-accent text-base-content">
                        <option value="">Seleccione una subcategoría...</option>
                        @foreach ($subcategorias as $subcategoria)
                            <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre_subcategoria }}</option>
                        @endforeach
                    </select>
                    <div class="mt-1 text-error-content font-bold">
                        @error('subcategoria_id')
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
                <label for="{{ $idModal }}"
                    class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        document.getElementById('{{ $idModal }}').addEventListener('change', function(event) {
            if (event.target.checked) {
                // Llama a la función `resetForm` del componente para restablecer los valores
                $wire.resetForm();
            }
        });

        $wire.on('close-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}').checked = false;
        });
    </script>
@endscript
