<div>
    <!-- The button to open modal -->
    <label for="{{ $idModal }}-{{ $item->id }}" class="btn btn-sm btn-accent text-base-content gap-2">
        <span class="icon-[pajamas--information-o] size-4"></span>
    </label>


    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="{{ $idModal }}-{{ $item->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">

            
            {{-- Título del Modal --}}
            <h3 class="text-xl font-bold text-center mb-5">Información del Mobiliario</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full gap-2">

                <div class="flex gap-1">
                    <strong>Código:</strong>
                    <p> {{ $item->codigo }} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Nombre del Mobiliario:</strong>
                    <p> {{ $item->nombre_mobiliario }} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Descripción:</strong>
                    <p> {{ $item->descripcion }} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Estado:</strong>
                    <p> {{ $item->estado }} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Ubicación:</strong>
                    <p> {{ $item->ubicacion }} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Categoría:</strong>
                    <p> {{ $item->subcategoria->categoria->nombre_categoria }} </p>
                </div>
                <div class="flex gap-1">
                    <strong>Subcategoría</strong>
                    <p> {{ $item->subcategoria->nombre_subcategoria }} </p>
                </div>
            </main>

            <div class="modal-action">
                <label for="{{ $idModal }}-{{ $item->id }}" class="btn">Cerrar</label>
            </div>
        </div>
    </div>
</div>
