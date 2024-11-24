<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-sm btn-warning text-warning-content gap-2 pl-3">
        <span class="icon-[line-md--edit] size-4"></span>
    </label>

    <input type="checkbox" id="{{ $idModal }}-{{ $item->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Editar Mobiliario</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full">

                {{-- Contenedor del nombre de la Ciudad --}}
                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Nombre del Mobiliario </label>
                    <input wire:model="Nombre" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('Nombre')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Descripción </label>
                    <textarea wire:model="Descripcion" class="input bg-accent h-20" 
                            placeholder="Escribir aquí..."></textarea>
                </div>

                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Ubicación </label>
                    <select wire:model="Ubicacion" class="input bg-accent">
                        <option value="">Selecciona una ubicación...</option>
                        <option value="Bodega">Bodega</option>
                        <option value="Casa">Casa</option>
                    </select>
                    <div class="mt-1 text-error-content font-bold">
                        @error('Ubicacion')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Categoría </label>
                    <div class="flex gap-2">
                        <select wire:model.live="IdCategoria" class="input bg-accent w-[72%]">
                            <option value="">Selecciona una categoría...</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
                            @endforeach
                        </select>
                        <livewire:crud.categorias.crear-categoria-modal :idModal="'createCategoriaModalEdit'">
                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Subcategoría </label>
                    <div class="flex gap-2">
                        <select wire:model.live="IdSubcategoria" class="input bg-accent w-[72%]">
                            <option value="">Selecciona una Subcategoría...</option>
                            @foreach ($subcategorias as $subcategoria)
                                <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre_subcategoria }}
                                </option>
                            @endforeach
                        </select>
                        <livewire:crud.sub-categorias.crear-sub-categoria-modal :idModal="'createSubCategoriaModalEdit'">
                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Código </label>
                    <label class="input bg-accent items-center flex" type="text" placeholder="Escribir aquí...">
                        {{ $Codigo }}
                    </label>
                    <div class="mt-1 text-error-content font-bold">
                        @error('Codigo')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="flex mt-4 items-center gap-2">
                    <label class="mb-1"> ¿Está en buen estado? </label>
                    <input wire:model="Estado" type="checkbox" class="checkbox checkbox-sm" />
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
                <label for="{{ $idModal }}-{{ $item->id }}"
                    class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}-{{ $item->id }}').checked = false;
        });
    </script>
@endscript
