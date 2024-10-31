<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="btn btn-accent text-base-content gap-2 pl-3">
        <span class="icon-[material-symbols--add-location-rounded] size-6"></span>
        Añadir
    </label>

    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/3 max-w-5xl bg-neutral">

            {{-- Título del Modal --}}
            <h3 class="text-lg font-bold text-center">Crear Mobiliario</h3>

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
                    <input wire:model="Descripcion" class="input bg-accent" type="text"
                        placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('Ubicacion')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <label class="mb-1"> Ubicación </label>
                    <input wire:model="Ubicacion" class="input bg-accent" type="text"
                        placeholder="Escribir aquí..." />
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
                        <livewire:crud.categorias.crear-categoria-modal :idModal="'createCategoriaModal'">
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
                        <livewire:crud.sub-categorias.crear-sub-categoria-modal :idModal="'createSubCategoriaModal'">
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
                    <input wire:model="Estado" type="checkbox" checked="checked" class="checkbox checkbox-sm" />
                </div>



            </main>

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

@script
    <script>
        document.getElementById($idModal).addEventListener('change', function(event) {
            if (event.target.checked) {
                // Llama a la función `resetForm` del componente para restablecer los valores
                $wire.resetForm();
            }
        });

        $wire.on('close-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById($idModal).checked = false;
        });
    </script>
@endscript
