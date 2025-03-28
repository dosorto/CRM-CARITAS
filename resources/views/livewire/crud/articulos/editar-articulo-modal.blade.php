<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-sm btn-warning text-warning-content gap-2 pl-3">
        <span class="icon-[line-md--edit] size-4"></span>
    </label>

    <input type="checkbox" id="{{ $idModal }}-{{ $item->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-3/5 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Editar Artículo</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full mt-4">
                <div class="flex flex-row gap-6 size-full">

                    {{-- Contenedor del nombre del artículo --}}
                    <div class="flex flex-col w-1/2">
                        <label class="mb-1"> Nombre del Artículo </label>
                        <input wire:model="nombre" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                        <div class="mt-1 text-error-content font-bold">
                            @error('nombre')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    {{-- Contenedor de la categoría del artículo --}}
                    <div class="flex flex-col w-1/2">
                        <label class="mb-1"> Categoría del Artículo</label>
                        <div class="flex gap-2">
                            <select wire:model.live="categoria_articulos_id" class="select bg-accent w-full">
                                @foreach ($categoria_articulos as $categoria_articulo)
                                    <option value="{{ $categoria_articulo->id }}">
                                        {{ $categoria_articulo->name_categoria }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex flex-row gap-6 size-full mt-4">
                    {{-- Contenedor del código de barras --}}
                    <div class="flex flex-col w-1/2">
                        <label class="mb-1"> Código de Barras </label>
                        <input wire:model="codigo_barra" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                        <div class="mt-1 text-error-content font-bold">
                            @error('codigo_barra')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    {{-- Contenedor de la cantidad en stock --}}
                    <div class="flex flex-col w-1/2">
                        <label class="mb-1"> Cantidad en Stock </label>
                        <input wire:model="cantidad_stock" class="input bg-accent" type="number" placeholder="Escribir aquí..." />
                        <div class="mt-1 text-error-content font-bold">
                            @error('cantidad_stock')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Contenedor de la descripción --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Descripción </label>
                    <textarea wire:model="descripcion" class="textarea bg-accent" placeholder="Escribir aquí..."></textarea>
                    <div class="mt-1 text-error-content font-bold">
                        @error('descripcion')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </main>

            {{-- Botones --}}
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
        document.getElementById('{{ $idModal }}-{{ $item->id }}').addEventListener('change', function(event) {
            if (event.target.checked) {
                $wire.resetForm();
            }
        });

        $wire.on('close-modal', () => {
            document.getElementById('{{ $idModal }}-{{ $item->id }}').checked = false;
        });
    </script>
@endscript
