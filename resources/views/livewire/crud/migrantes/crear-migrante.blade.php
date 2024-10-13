<div class="dark">
    <div class="dark:text-gray-300">

        <div class="flex mb-8">
            <div class="w-24">
                <a href=" /migrantes" class="text-gray-800 hover:underline text-lg dark:text-gray-300">
                    &larr; Volver
                </a>
            </div>
            {{-- Titulo --}}
            <div class="w-full flex justify-center me-24">
                <h1 class="text-2xl font-bold">
                    Registrar Nuevo Migrante
                </h1>
            </div>
        </div>

        {{-- full pagina --}}
        <div class="w-full flex justify-center h-full">

            {{-- columna central --}}
            <div class="flex-col h-full w-2/3">

                {{-- cuadro clarito que engloba los inputs --}}
                <div class="bg-slate-800 rounded-lg p-10">

                    @if ($step == 1)
                        <h1 class="mb-6 text-xl font-bold"> Datos Personales </h1>
                        {{-- filas --}}
                        <div class="text-lg">

                            <div class="w-full flex gap-12 mb-6 h-full">

                                <div class="size-full flex-col items-center">
                                    <label class="block mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Nombres
                                    </label>
                                    <input type="text" wire:model="datosPersonales.nombres"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>


                                <div class="size-full flex-col items-center">
                                    <label class="block mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Apellidos
                                    </label>

                                    <input type="text" wire:model="datosPersonales.apellidos"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>

                            </div>

                            {{-- <div class="w-full flex gap-12 mb-6">

                            <div class="size-full flex-col items-center">
                                <label class="block mb-2 font-medium text-gray-900 dark:text-gray-300">
                                    Primer Apellido
                                </label>
                                <input type="text" wire:model="primer_apellido"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>

                            <div class="size-full flex-col items-center">
                                <label class="block mb-2 font-medium text-gray-900 dark:text-gray-300">
                                    Segundo Apellido
                                </label>

                                <input type="text" wire:model="segundo_apellido"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>

                        </div> --}}

                            <div class="w-full flex gap-12 mb-6">



                                <div class="w-1/2 h-full flex-col items-center">
                                    <label class="block mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Tipo de Identificación
                                    </label>
                                    <select wire:model="datosPersonales.tipoIdentificacion"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Seleccione...</option>
                                        <option>DNI</option>
                                        <option>Pasaporte</option>
                                    </select>
                                </div>

                                <div class="w-1/2 size-full flex-col items-center">
                                    <label class="block mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Número de Identificación
                                    </label>

                                    <input type="text" wire:model="datosPersonales.numeroIdentificacion"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                            </div>

                            <div class="w-full flex gap-12 mb-6">

                                <div class="w-1/2 h-full flex-col items-center">
                                    <label class="block mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Estado Civil
                                    </label>
                                    <select wire:model="datosPersonales.estadoCivil" required
                                        class="bg-gray-50 border borde r-gray-300 text-gray-900 rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Seleccione...</option>
                                        <option>Soltero/a</option>
                                        <option>Casado/a</option>
                                        <option>Divorciado/a</option>
                                        <option>Viudo/a</option>
                                        <option>Unión Libre</option>
                                    </select>
                                </div>

                                <div class="w-1/2 size-max flex items-center gap-16 justify-center">

                                    <div class="flex-col">
                                        {{-- Sexo --}}
                                        <label
                                            class="flex justify-cernter mb-2 font-medium text-gray-900 dark:text-gray-300">
                                            Sexo
                                        </label>
                                        <div class="flex items-center h-full pt-2">
                                            <input type="radio" id="sexo_m" value="M"
                                                wire:model="datosPersonales.sexo"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                            <label for="sexo_m"
                                                class="ml-1 font-medium text-gray-900 dark:text-gray-300">M</label>

                                            <input type="radio" id="sexo_f" value="F"
                                                wire:model="datosPersonales.sexo"
                                                class="ml-4 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                            <label for="sexo_f"
                                                class="ml-1 font-medium text-gray-900 dark:text-gray-300">F</label>
                                        </div>
                                    </div>
                                    <div class="flex-col">
                                        <!-- LGBT Checkbox -->
                                        <label class="block mb-2 font-medium text-gray-900 dark:text-gray-300">
                                            LGBT
                                        </label>
                                        <div class="flex items-center h-full pt-2">
                                            <input type="checkbox" wire:model="datosPersonales.esLGBT"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                            <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">¿Es
                                                LGBT?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full flex gap-12 mb-2">
                                <div class="size-full flex-col items-center">
                                    <label class="block mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Pais
                                    </label>
                                    <select wire:model="datosPersonales.idPais"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Seleccione...</option>
                                        @foreach ($paises as $pais)
                                            <option value="{{ $pais->id }}">{{ $pais->nombre_pais }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="size-full flex-col items-center3">
                                    <label class="block mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Fecha de Nacimiento
                                    </label>
                                    <input type="date" wire:model="datosPersonales.fechaNacimiento"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                            </div>
                        </div>
                    @elseif($step == 2)
                        <div class="flex-col">
                            <h1 class="mb-6 text-xl font-bold">Registrar Familiar</h1>

                            <div class="flex">
                                <div class="w-full">
                                    <div class="flex-col items-center text-center px-4 text-lg">

                                        ¿Tiene ya un familiar registrado?



                                        <div class="flex-col items-center mt-2">
                                            <input type="radio" id="familiar_si" name="tiene_familiar" value="1"
                                                wire:model.live="tiene_familiar"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                            <label for="familiar_si"
                                                class="ml-1 mr-3 font-medium text-gray-900 dark:text-gray-300">Sí</label>

                                            <input type="radio" id="familiar_no" name="tiene_familiar" value="0"
                                                wire:model.live="tiene_familiar"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                            <label for="familiar_no"
                                                class="ml-1 font-medium text-gray-900 dark:text-gray-300">No</label>
                                        </div>


                                    </div>
                                </div>

                                {{-- <div class="dark:border-l-2 w-1/2 flex items-center  h-full dark:border-gray-500 pl-4">
                                    <div>
                                        <p class="text-xs dark:text-slate-400">
                                            Nota: Si ya tiene un familiar registrado, debe seleccionarse para
                                            relacionarlos por el Número de Familia.
                                        </p>
                                    </div>
                                </div> --}}
                            </div>
                        </div>




                        @if ($tiene_familiar)

                            {{-- Información del familiar seleccionado --}}
                            @if ($familiar_seleccionado)

                                <div class="border border-gray-600 rounded-lg mt-8 p-4 flex-col">

                                    <div class="flex justify-center mb-4 text-lg font-bold">
                                        Familiar Seleccionado
                                    </div>

                                    <div class="flex gap-2 mt-2">
                                        <p class="font-bold">
                                            Nombre Completo:
                                        </p>
                                        <p>
                                            {{ $familiar->primer_nombre . ' ' . $familiar->segundo_nombre . ' ' . $familiar->primer_apellido . ' ' . $familiar->segundo_apellido }}
                                        </p>
                                    </div>

                                    <div class="flex gap-2 mt-2">
                                        <p class="font-bold">
                                            Número de Identificación:
                                        </p>
                                        <p>
                                            {{ $familiar->numero_identificacion . ' (' . $familiar->tipo_identificacion . ')' }}
                                        </p>
                                    </div>
                                    <div class="flex gap-2 mt-2">
                                        <p class="font-bold">
                                            Código Familiar:
                                        </p>
                                        <p>
                                            {{ $familiar->codigo_familiar }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex mt-6 justify-center">
                                    <button type="button" wire:click="limpiarFamiliar"
                                        class="dark:bg-gray-700 dark:hover:bg-gray-600 text-white py-2 px-5 rounded">
                                        Seleccionar un Familiar Diferente</button>
                                </div>
                            @else
                                {{-- Tabla de Búsqueda --}}
                                <div class="w-full flex-col mt-6">
                                    <div class="flex mb-2 justify-between">
                                        {{-- Buscador --}}
                                        <div class="flex items-center">
                                            <div class="text-nowrap">
                                                <span class="mr-2">Buscar por:</span>
                                            </div>

                                            <div class="border-b dark:border-gray-400">
                                                <select wire:model="atributo"
                                                    class="hover:bg-gray-300 bg-gray-200 text-gray-800 block dark:bg-slate-800 dark:placeholder-gray-400 dark:text-white border-none">
                                                    <option value="numero_identificacion">Número de Identificación
                                                    </option>
                                                    <option value="primer_nombre">Primer Nombre</option>
                                                    <option value="primer_apellido">Primer Apellido</option>
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Botón de Limpiar Filtro --}}

                                        <button wire:click="limpiarFiltro"
                                            class="py-2 px-4 font-medium text-gray-900 bg-gray-50 border border-gray-300 rounded hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-1 focus:ring-blue-600 focus:text-blue-600 dark:bg-gray-700 dark:border-gray-700 dark:text-gray-200 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            Limpiar Filtros
                                        </button>


                                    </div>

                                    <div>
                                        <div class="w-full flex mt-4">

                                            <input type="text" wire:model="texto_busqueda"
                                                class="ps-3 rounded-s text-gray-900 border-y border-gray-300 w-full bg-gray-50 focus:ring-gray-500 focus:border-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Buscar...">
                                            {{-- Botón de Búsqueda de la derecha --}}
                                            <div class="relative w-[60px]">
                                                <button title="Buscar" wire:click="buscar" type="button"
                                                    class="size-full rounded-e hover:bg-gray-300 bg-gray-200 border border-gray-300 text-gray-900 border-s-gray-100 p-2 dark:bg-gray-600 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-500 dark:focus:bg-neutral-600">
                                                    <div class="flex justify-center items-center h-full w-full gap-2">
                                                        <svg class="w-4 h-4 text-gray-600 dark:text-gray-300"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="3"
                                                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>

                                        {{-- Tabla --}}
                                        <div class="overflow-x-auto overflow-y-auto mt-4 rounded-lg max-h-[240px]"
                                            style="scrollbar-width: thin; scrollbar-color: #4b5563 #1f2937;">
                                            <!-- Ajusta max-h según sea necesario -->
                                            <table
                                                class="min-w-full text-xs text-left text-gray-500 dark:text-gray-400 border border-gray-700">
                                                <thead
                                                    class="text-xs uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th class="px-2 py-2">NOMBRE</th>
                                                        <th class="px-2 py-2">IDENTIFICACIÓN</th>
                                                        <th class="px-2 py-2">PAÍS</th>
                                                        <th class="px-2 py-2">OPCIONES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if ($migrantes_filtrados->isEmpty())
                                                        <tr>
                                                            <td colspan="4" class="w-full p-4 text-center">
                                                                No hay resultados
                                                            </td>
                                                        </tr>
                                                    @else
                                                        @foreach ($migrantes_filtrados as $migrante)
                                                            <tr
                                                                class="bg-white border-b dark:bg-slate-800 dark:border-gray-700">
                                                                <td class="px-2 py-2">
                                                                    {{ $migrante->primer_nombre . ' ' . $migrante->primer_apellido }}
                                                                </td>
                                                                <td class="px-2 py-2">
                                                                    {{ $migrante->numero_identificacion }}
                                                                </td>
                                                                <td class="px-2 py-2">
                                                                    {{ $migrante->pais->nombre_pais }}
                                                                </td>
                                                                <td class="px-2 py-2">

                                                                    <button type="button"
                                                                        wire:click="
                                                                $dispatch(
                                                                    'openModal', { 
                                                                        component: 'crud.migrantes.info-migrante', 
                                                                        arguments: { id: {{ $migrante->id }} }})"
                                                                        title="Mostrar información completa"
                                                                        class="relative text-gray-800 dark:text-white bg-gray-400 hover:bg-gray-300 focus:bg-gray-500 font-medium rounded-lg px-2 py-2 text-center inline-flex items-center me-2 dark:bg-slate-700 dark:hover:bg-slate-600 dark:focus:bg-zinc-700">
                                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            fill="currentColor" viewBox="0 0 24 24">
                                                                            <path fill-rule="evenodd"
                                                                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                    </button>


                                                                    <button type="button"
                                                                        title="Seleccionar Como Familiar"
                                                                        wire:click="seleccionarMigrante( {{ $migrante->id }} )"
                                                                        class="relative group text-white bg-green-800 hover:bg-green-700 focus:bg-green-900 font-medium rounded-lg px-2 py-2 text-center inline-flex items-center me-2">
                                                                        <svg class="w-4 h-4 text-white"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="4" d="M5 13l4 4L19 7" />
                                                                        </svg>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif





                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="border border-gray-600 rounded-lg p-4 flex mt-6 gap-2">
                                <p class="font-bold">
                                    Nuevo Código de Familia:
                                </p>
                                <p>
                                    {{ $codigoFamilia }}
                                </p>
                            </div>

                        @endif
                    @elseif($step == 3)
                        <h1 class="mb-6 text-xl font-bold"> Registrar Expediente</h1>
                        pendiente...
                        <button wire:click="test">
                            debug
                        </button>
                        {{-- <div class="w-full flex justify-end gap-4">
                            <button wire:click="previousStep"
                                class="dark:bg-slate-700 py-3 px-5 mt-5 rounded-lg dark:hover:bg-slate-600">Anterior</button>
                            <button wire:click="nextStep"
                                class="dark:bg-slate-700 py-3 px-5 mt-5 rounded-lg dark:hover:bg-slate-600">Siguiente</button>
                        </div> --}}

                    @endif
                    <div class="w-full flex justify-end gap-4">
                        @if ($step > 1)
                            <button wire:click="previousStep"
                                class="dark:bg-slate-700 py-3 px-5 mt-5 rounded-lg dark:hover:bg-slate-600">Anterior</button>
                        @endif
                        <button wire:click="nextStep"
                            class="dark:bg-slate-700 py-3 px-5 mt-5 rounded-lg dark:hover:bg-slate-600">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
