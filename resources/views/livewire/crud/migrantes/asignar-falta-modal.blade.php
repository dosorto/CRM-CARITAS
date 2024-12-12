<div>
    <!-- The button to open modal -->
    <label for="asignarFaltaModal" class="btn btn-error text-base-content pr-5">
        <span class="icon-[ci--error] size-6"></span>
        Asignar Falta Disciplinaria
    </label>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="asignarFaltaModal" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-5xl h-max w-1/2 bg-neutral border-2 border-accent flex flex-col">

            <header class="h-max w-full flex flex-col items-center">
                <h3 class="text-lg font-bold">Asignar Falta Disciplinaria a:</h3>
                <h3 class="text-lg font-semibold">{{ $nombre }}</h3>
            </header>

            <label class="label">Falta</label>
            <select class="select bg-accent" wire:model.live="faltaId">
                @foreach ($faltas as $falta)
                    <option value="{{ $falta->id }}">{{ $falta->falta }}</option>
                @endforeach
            </select>
            @error('faltaId')
                <p class="text-error font-semibold">{{ $message }}</p>
            @enderror

            <p class="text-lg my-6 text-center w-full"><strong>Gravedad: </strong>{{ $gravedad }}</p>
            <div class="modal-action">
                <button class="btn btn-success text-base-content" wire:click="asignar">
                    Asignar
                </button>
                <label for="asignarFaltaModal" class="btn btn-accent text-base-content">Cancelar</label>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close-modal', () => {
            // Cerrar el modal desactivando el checkbox
            document.getElementById('asignarFaltaModal').checked = false;
        });
    </script>
@endscript
