<div>
    <!-- Botón para abrir el modal -->
    <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-sm btn-accent text-base-content gap-2">
        <span class="icon-[pajamas--information-o] size-4"></span>
    </label>

    <!-- Modal (colócalo antes de la etiqueta </body>) -->
    <input type="checkbox" id="{{ $idModal }}-{{ $item->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">

            {{-- Título del Modal --}}
            <h3 class="text-xl font-bold text-center mb-5">Información del Artículo</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full gap-2">

                <div class="flex gap-1">
                    <strong>Nombre:</strong>
                    <p> {{ $item->nombre }} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Descripción:</strong>
                    <p> {{ $item->descripcion }} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Código de Barra:</strong>
                    <p> {{ $item->codigo_barra }} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Cantidad en Stock:</strong>
                    <p> {{ $item->cantidad_stock }} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Categoría:</strong>
                    <p> {{ $item->categoria_articulo_id }} </p>
                </div>
            </main>

            <div class="modal-action">
                <label for="{{ $idModal }}-{{ $item->id }}" class="btn">Cerrar</label>
            </div>
        </div>
    </div>
</div>
