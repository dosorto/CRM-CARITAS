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
            <h3 class="text-xl font-bold text-center mb-5">Información de la Donación</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full gap-2">

                <!-- Información del Donante -->
                <div class="flex gap-1">
                    <strong>Donante:</strong>
                    <p>{{ $item->donante->nombre_donante }}</p> 
                </div>

                <!-- Fecha de Donación -->
                <div class="flex gap-1">
                    <strong>Fecha de Donación:</strong>
                    <p>{{ $item->fecha_donacion }}</p> 

                <!-- Artículos Donados -->
                <div class="flex gap-1">
                    <strong>Artículos Donados:</strong>
                    <ul>
                        @foreach ($item->articulos as $articulo)
                            <li>{{ $articulo->nombre }} - Cantidad: {{ $articulo->pivot->cantidad_donada }}</li>
                        @endforeach
                    </ul>
                </div>
            </main>

            {{-- Botón para cerrar el Modal --}}
            <div class="modal-action">
                <label for="{{ $idModal }}-{{ $item->id }}" class="btn">Cerrar</label>
            </div>
        </div>
    </div>
</div>
