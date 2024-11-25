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
            <h3 class="text-lg font-bold text-center">Crear Artículo</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">

                {{-- Contenedor del nombre del artículo --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Nombre del Artículo </label>
                    <input wire:model="nombre" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('nombre')
                            {{ $message }}
                        @enderror
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

                {{-- Contenedor del código de barras --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Código de Barras </label>
                    <input wire:model="codigo_barra" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('codigo_barra')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Contenedor de la cantidad en stock --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Cantidad en Stock </label>
                    <input wire:model="cantidad_stock" class="input bg-accent" type="number" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('cantidad_stock')
                            {{ $message }}
                        @enderror
                    </div>
                </div>


                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Categoría de Articulos </label>
                    <div class="flex gap-2">
                        <select wire:model.live="categoria_articulos_id" class="input bg-accent w-[72%]">
                            @foreach ($categoria_articulos as $categoria_articulo)
                                <option value="{{ $categoria_articulo->id }}">{{ $categoria_articulo->name_categoria }}</option>
                            @endforeach
                        </select>
                        <livewire:crud.categoria-articulos.crear-categoria-articulos-modal :idModal="'createCategoriaArticulosModal'">
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
                <button wire:click="cancelar"
                    class="btn btn-accent text-base-content">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('{{$idModal}}').checked = false;
        });
    </script>
@endscript