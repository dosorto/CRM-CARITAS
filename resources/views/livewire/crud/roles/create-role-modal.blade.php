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
                    <input type="text" class="input bg-accent input-sm input-bordered mb-2"
                        placeholder="Buscar permisos..." />
                    <div class="border-2 border-accent rounded-lg flex flex-col grow p-4 gap-2 overflow-auto">
                        {{-- Hacer un ciclo con checkboxes para todos los permisos --}}
                        <p>1</p>
                        <p>2</p>
                        <p>3</p>
                        <p>4</p>
                        <p>5</p>
                        <p>6</p>
                        <p>7</p>
                        <p>8</p>
                        <p>9</p>
                        <p>10</p>
                        <p>11</p>
                        <p>12</p>
                        <p>13</p>
                        <p>14</p>
                        <p>15</p>
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
