<div>
    {{-- Botón para activar el Modal --}}
    <label for="{{ $idModal }}-{{ $id }}" class="btn btn-neutral text-base-content w-full gap-2">
        <span class="icon-[flowbite--info-circle-solid] size-4"></span>
        Detalles
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}-{{ $id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-2/3 h-max max-w-5xl bg-neutral border-2 border-accent">

            {{-- Título del Modal --}}
            <h3 class="text-xl font-bold text-center mb-2">Acta de Entrega</h3>
            <h3 class="text-lg font-semibold text-center mb-5">
                {{ $item->created_at->format('d / m / Y') }} </h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full gap-2">

                @if ($item)

                    <div class="overflow-x-auto">
                        <table class="table table-pin-rows table-pin-cols border-2 border-accent">
                            <thead class="text-base">
                                <th>Nombre del Artículo</th>
                                <th>Código de Barra</th>
                                <th>Cantidad</th>
                            </thead>

                            <tbody>
                                @foreach ($item->detalles_acta_entrega as $detalle)
                                    <tr class="border border-accent">
                                        <td>
                                            {{ $detalle->articulo->nombre }}
                                        </td>
                                        <td>
                                            {{ $detalle->articulo->codigo_barra }}
                                        </td>
                                        <td>
                                            {{ $detalle->cantidad }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    No hay actas de entrega...
                @endif

            </main>

            <div class="modal-action">
                <label for="{{ $idModal }}-{{ $id }}"
                    class="btn btn-accent text-base-content">Cerrar</label>
            </div>
        </div>
    </div>
</div>
