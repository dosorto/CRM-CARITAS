<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}" class="btn btn-accent gap-2 pl-3">
        <span class="icon-[mdi--plus-circle] size-6"></span>
        Añadir
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-1/2 h-full max-w-5xl bg-neutral flex flex-col justify-between overflow-hidden">

            <main class="flex flex-col w-full overflow-hidden">

                {{-- Título del Modal --}}
                <h3 class="text-lg font-bold text-center">Crear Rol</h3>

                {{-- Contenido --}}
                <div class="flex w-full flex-col mt-6">
                    <label class="mb-1"> Nombre del Rol </label>
                    <input wire:model="Nombre" class="input bg-accent" type="text" placeholder="Escribir aquí..." />
                    <div class="mt-1 text-error-content font-bold">
                        @error('Nombre')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Aqui van los permisos --}}


                <div class="flex flex-col mt-6 overflow-auto">

                    <label class="mb-1"> Seleccione los Permisos que Tendrá este Rol </label>
                    <div class="w-full input input-sm bg-accent input-bordered flex items-center justify-between my-2">
                        <input wire:model.live.debounce.200ms="textoBusquedaPermisos" type="text" class="w-full mr-2"
                            placeholder="Buscar..." />
                        <span wire:loading.remove wire:target="textoBusquedaPermisos"
                            class="icon-[map--search] size-5 text-gray-400"></span>
                        <span wire:loading wire:target="textoBusquedaPermisos" class="loading loading-dots loading-sm"></span>
                    </div>
                    <div class="border-2 border-accent rounded-lg flex flex-col grow p-4 gap-2 overflow-auto">

                        @foreach ($permissions as $id => $name)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" wire:model="selectedPermissions" value="{{ $id }}" class="checkbox checkbox-accent" />
                                <span>{{ $name }}</span>
                            </label>
                        @endforeach

                    </div>

                </div>

            </main>

            <div class="modal-action">
                <div wire:loading class="flex items-center p-2 justify-start size-full">
                    <span class="loading loading-spinner loading-lg text-gray-600"></span>
                </div>
                <button type="button" wire:click="create" class="btn btn-success gap-1 pl-3">
                    <span class="icon-[mdi--plus-circle] size-5"></span>
                    Crear
                </button>
                <button wire:click="closeModal" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close-modal', () => {
            // Cerrar el modal desactivando el checkbox
            document.getElementById('{{ $idModal }}').checked = false;
        });
    </script>
@endscript
