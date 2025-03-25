<div class="h-screen w-full flex flex-col px-6 overflow-hidden">

    {{-- Título y botón para listado --}}
    <header class="flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold">Crear Donación</h1>
        <div>
            <a href="{{ route('ver-donaciones') }}" class="btn btn-accent btn-sm text-base-content h-10">
                <span class="icon-[ph--user-list-bold] size-6"></span>
                Listado de Donaciones
            </a>
        </div>
    </header>

    <main class="flex flex-grow flex-row w-full border-2 border-accent mt-8 rounded-lg overflow-hidden min-h-0">
        {{-- Selección de Donante, Fecha y Artículos --}}
        <section class="w-3/5 p-4 overflow-y-auto">
            {{-- Buscador de Donante --}}
            <div class="w-full flex flex-col mb-4">
                <label for="donante" class="text-lg font-semibold label">Buscar Donante:</label>
                <input wire:model="nombre_donante" class="input input-bordered bg-accent" type="text" id="donante"
                    list="donantes" placeholder="Escribe el nombre del donante...">

                <datalist id="donantes">
                    @foreach ($donantes as $donante)
                        <option value="{{ $donante->nombre_donante }}" data-id="{{ $donante->id }}">
                            {{ $donante->nombre_donante }}
                        </option>
                    @endforeach
                </datalist>

                <input type="hidden" wire:model="id_donante"> <!-- Campo oculto para el ID del donante -->

                @error('id_donante')
                    <span class="text-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Selección de Artículo --}}
            <form wire:submit.prevent="selectArticulo">
                <div class="flex gap-4">
                    <div class="flex flex-col w-3/5 mb-4">
                        <label for="articulo" class="text-lg font-semibold">Código del Artículo</label>
                        <input wire:model="codigo_barra" list="dataArticulos" id="articulo" type="text"
                            class="input bg-accent" placeholder="Escribir nombre del artículo...">
                        <datalist id="dataArticulos">
                            @foreach ($articulos as $articulo)
                                <option value="{{ $articulo->codigo_barra }}">
                                    {{ $articulo->nombre }}
                                </option>
                            @endforeach
                        </datalist>
                    </div>

                    <div class="flex flex-col w-2/5">
                        <label for="cantidadSeleccionada" class="text-lg font-semibold">Cantidad</label>
                        <input wire:model="cantidadSeleccionada" id="cantidadSeleccionada" type="number"
                            class="input bg-accent" min="1" placeholder="Cantidad...">
                    </div>
                </div>

                {{-- Entrada de Fecha de Donación --}}
                <div class="mb-4">
                    <label for="fecha_donacion" class="text-lg font-semibold">Fecha de Donación</label>
                    <input wire:model="fecha_donacion" id="fecha_donacion" type="date" value="{{$fecha_donacion}}"
                        class="input bg-accent w-full">
                    @error('fecha_donacion')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-center mt-4">
                    <button type="submit" class="btn bg-gray-500 hover:bg-gray-600 text-white font-semibold tracking-wide w-1/2 rounded-md shadow-md transition duration-200">
                        Seleccionar Artículo
                    </button>
                </div>                           
            </form>
        </section>

        {{-- Lista de Artículos Seleccionados --}}
        <section class="w-2/5 h-full p-6 bg-accent flex flex-col">
            <h3 class="text-center text-base-content font-semibold mb-2">Artículos Seleccionados</h3>
            <hr class="border border-gray-400 mb-2">

            <div class="flex-1 overflow-y-auto">
                @if ($cantidad)
                    <ul>
                        @foreach ($cantidad as $articuloId => $cantidad)
                            <li class="flex justify-between mb-2">
                                <span>{{ $articulos->find($articuloId)->nombre ?? 'Artículo desconocido' }}
                                    (Cantidad: {{ $cantidad ?? 0 }})
                                </span>
                                <button wire:click="removeArticulo({{ $articuloId }})"
                                    class="btn btn-error btn-sm">Eliminar</button>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center">No se han seleccionado artículos.</p>
                @endif
            </div>
        </section>
    </main>

    <footer class="py-4 text-center">
        <button wire:click="create" class="btn bg-green-600 hover:bg-green-700 text-white font-semibold tracking-wide w-1/3 rounded-md shadow-md transition duration-200">
            Crear Donación
        </button>              
    </footer>    
</div>
