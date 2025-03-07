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
            <h3 class="text-xl font-bold text-center mb-5">Información del Rol</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full gap-2">

                <!-- Información del Donante -->
                <div class="flex gap-1">
                    <strong>Nombre del rol:</strong>
                    <p>{{ $item->name }}</p>
                </div>
                <strong>Permisos Asignados:</strong>
                <ul>
                    @foreach ($item->permissions as $id => $name)
                        <li>{{ $name->name }}</li>
                    @endforeach
                </ul>
                {{-- Botón para cerrar el Modal --}}
                <div class="modal-action">
                    <label for="{{ $idModal }}-{{ $item->id }}" class="btn">Cerrar</label>
                </div>
        </div>

            </main>


    </div>
</div>

</div>
