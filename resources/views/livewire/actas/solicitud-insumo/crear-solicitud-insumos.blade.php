<div class="h-screen w-full flex flex-col px-6 overflow-hidden">
    {{-- Título y cosa extra --}}
    <header class="flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Realizar Solicitud de Insumos</h1>
        <div>
            <a href="{{ route('ver-actas-entrega') }}" class="btn btn-accent btn-sm text-base-content h-10" type="button">
                <span class="icon-[ph--user-list-bold] size-6"></span>
                Listado de Solicitudes de Insumos
            </a>
        </div>
    </header>

    <main class="flex flex-grow flex-row w-full border-2 border-accent mt-8 rounded-lg overflow-hidden min-h-0">

        {{-- migrante y seleccionar articulo --}}
        <section class="w-3/5 p-4 overflow-y-auto">


            {{-- Formulario para seleccionar el articulo --}}
            <div class="mt-4 flex flex-col">
                <form wire:submit.prevent="selectArticulo">
                    <div class="flex gap-4">

                        <div class="flex flex-col w-3/5">
                            <label class="text-lg font-semibold label"> Código </label>
                            <input wire:model="codigo" list="insumos" type="text" class="input bg-accent"
                                placeholder="Escribir aquí..." id="codigoInput">
                            <datalist id="insumos">
                                @foreach ($insumos as $insumo)
                                    <option value="{{ $insumo->codigo_barra }}">
                                        {{ $insumo->nombre }}
                                    </option>
                                @endforeach
                            </datalist>

                            @error('codigo')
                                <label class="text-error">* {{ $message }}</label>
                            @enderror
                        </div>

                        <div class="flex flex-col w-2/5">
                            <label class="text-lg font-semibold label">Cantidad </label>
                            <input wire:model.live="cantidad" type="number" class="input bg-accent"
                                placeholder="Escribir aquí...">
                            @error('cantidad')
                                <label class="text-error">* {{ $message }}</label>
                            @enderror
                        </div>



                    </div>
                    <div class="text-center">
                        <button type="submit" class="mt-8 btn btn-success text-base-content w-1/2">
                            Seleccionar Artículo
                        </button>
                    </div>
                </form>
            </div>
        </section>

        {{-- lista de articulos --}}
        <section class="w-2/5 h-full p-6 bg-accent flex flex-col min-h-0">
            <div class="h-full flex flex-col"> <!-- Añadido flex flex-col -->
                {{-- Título fijo --}}
                <div class="mb-2"> <!-- Añadido margin bottom -->
                    <h3 class="text-center text-base-content font-semibold">
                        Lista de Artículos Seleccionados
                    </h3>
                    <hr class="border border-gray-400">
                </div>

                {{-- Lista con scroll --}}
                <div class="flex-1 overflow-y-auto">
                    @if ($insumosSeleccionados && sizeof($insumosSeleccionados['articulos']) > 0)
                        <div class="p-4">
                            @for ($i = 0; $i < sizeof($insumosSeleccionados['articulos']); $i++)
                                <div class="flex flex-col h-max w-full">
                                    <div class="flex flex-row w-full justify-between">
                                        <div class="flex flex-col">
                                            <p>
                                                <strong class="text-lg">
                                                    {{ $insumosSeleccionados['articulos'][$i]->nombre }}
                                                </strong>
                                            </p>
                                            <p>
                                                Cantidad: {{ $insumosSeleccionados['cantidades'][$i] }}
                                            </p>
                                        </div>
                                        <button wire:click="cancelarArticulo( {{$i}} )"
                                            class="btn btn-error text-primary-content">
                                            <span class="icon-[mingcute--delete-2-fill] size-6"></span>
                                        </button>
                                    </div>
                                    <hr class="border border-base-content my-1">
                                </div>
                            @endfor
                        </div>
                    @else
                        <div class="flex flex-grow justify-center items-center h-full">
                            <p class="w-1/2 text-center">
                                No ha seleccionado
                                ningún insumo...
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

    <footer class="py-4 text-center">
        <button wire:click="generarSolicitud" class="btn btn-primary w-1/3"
            @if (empty($insumosSeleccionados['articulos']) || empty($insumosSeleccionados['cantidades'])) disabled @endif>
            Generar Solicitud
        </button>
    </footer>

    {{-- Modal para crear en caso de que no exista el artículo. --}}
    <input type="checkbox" id="alertCreateActaEntrega" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box bg-neutral">
            <h3 class="text-lg font-bold text-center">Oops...</h3>
            <p class="py-4">Este código de artículo actualmente no existe en el sistema.</p>
            {{-- <p class="py-4"> <strong>¿Desea Crearlo?</strong> </p> --}}
            <div class="modal-action ">
                {{-- <button class="btn btn-success text-base-content"> Crear </button> --}}
                <label for="alertCreateActaEntrega" class="btn btn-accent text-base-content">Cerrar</label>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('focus-codigo', () => {
            // pone el cursor en el input de codigo.
            document.getElementById('codigoInput').focus();
        });
        $wire.on('open-create-modal', () => {
            // Cierra el modal desactivando el checkbox
            document.getElementById('alertCreateActaEntrega').checked = true;
        });
    </script>
@endscript