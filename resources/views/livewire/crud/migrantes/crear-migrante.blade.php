<div>
    {{-- Titulo --}}
    <header class="w-full flex justify-start mb-6">
        <h2 class="text-xl font-bold">
            Registrar Nuevo Migrante
        </h2>
    </header>

    {{-- columna central --}}
    <main class="flex-col size-full">

        {{-- cuadro clarito que engloba los inputs --}}
        <div class="bg-gray-50 dark:bg-slate-800 rounded p-6 shadow-lg">

            {{-- PASOS --}}

            {{-- Paso 1: Buscar número de identificación --}}
            @if ($step == 1)
                <section class="flex-col">

                    <header class="flex-col justify-center text-center mb-8">
                        <h3 class="text-lg font-semibold mb-2">
                            Ingresar Número de Identificación del Migrante
                        </h3>
                        <p class="text-sm">
                            Si ya existe en el sistema, se registrará como re-ingreso.
                        </p>
                    </header>

                    <main class="w-full">
                        <div class="flex flex-col items-center mb-4">
                            <label class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300">
                                Número de Identificación
                            </label>
                            <div class="flex justify-center w-full mb-2">
                                <input type="text" wire:model="datosPersonales.numeroIdentificacion"
                                    class="w-1/3 text-sm p-2 text-center bg-white border border-gray-500 border-r-0 text-gray-700 rounded-l dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-0 focus:border-gray-500"
                                    required />

                                <button wire:click="buscarExpediente"
                                    class="w-[40px] bg-gray-100 dark:bg-gray-600 flex justify-center items-center rounded-r border border-gray-500 border-l-0 hover:bg-gray-200 dark:hover:bg-gray-500 focus:ring-0">
                                    @svg('ionicon-search-sharp', 'w-5 h-5')
                                </button>
                            </div>
                            @if (session('error'))
                                <label class="text-xs mb-2 font-medium text-red-500 dark:text-red-500">
                                    {{ session('error') }}
                                </label>
                            @endif
                        </div>



                        @if ($migranteEncontrado !== 0)

                            @if ($migranteEncontrado)
                                <div class="text-center p-3 crounded text-sm">
                                    <h3 class="mb-3">
                                        <strong>Se encontró el siguiente registro:</strong>
                                    </h3>
                                    <div class="mb-2 flex gap-2">
                                        <p class="font-bold">Nombre Completo:</p>
                                        <p>
                                            {{ $migranteEncontrado->primer_nombre .
                                                ' ' .
                                                $migranteEncontrado->segundo_nombre .
                                                ' ' .
                                                $migranteEncontrado->primer_apellido .
                                                ' ' .
                                                $migranteEncontrado->segundo_apellido }}
                                        </p>
                                    </div>
                                    <div class="mb-2 flex gap-2">
                                        <p class="font-bold">Documento de Identificación:</p>
                                        <p>
                                            {{ $migranteEncontrado->tipo_identificacion }}
                                        </p>
                                    </div>
                                    <div class="mb-2 flex gap-2">
                                        <p class="font-bold">País de Procedencia:</p>
                                        <p>
                                            {{ $migranteEncontrado->pais->nombre_pais }}
                                        </p>
                                    </div>
                                    </p>
                                </div>
                            @else
                                No se encontró ningún registro, se registrarán los datos personales a continuación
                            @endif

                        @endif

                    </main>
                    <footer class="flex justify-end gap-4">
                        {{-- Botones --}}

                        <livewire:components.previous-step-button>
                            <livewire:components.next-step-button>

                    </footer>
                </section>


                {{-- Paso 2: Ingresar Datos Personales --}}
            @elseif ($step == 2)
                <section class="flex-col">

                    <header class="flex-col justify-center text-center mb-6 my-2">
                        <h3 class="text-lg font-semibold">
                            Datos Personales
                        </h3>
                    </header>

                    <main class="w-full">


                        <div class="flex gap-6 w-full">
                            <section class="w-1/2 items-center mb-6">
                                <div class="flex flex-col">
                                    <label class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Nombres
                                    </label>
                                    <input type="text" wire:model="datosPersonales.nombres"
                                        placeholder="Escribir aquí..."
                                        class="text-sm p-2 bg-white border border-gray-500 text-gray-700 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-0 focus:border-gray-500"
                                        required />
                                </div>
                            </section>

                            <section class="w-1/2 items-center mb-6">
                                <div class="flex flex-col">
                                    <label class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Apellidos
                                    </label>
                                    <input type="text" wire:model="datosPersonales.apellidos"
                                        placeholder="Escribir aquí..."
                                        class="text-sm p-2 bg-white border border-gray-500 text-gray-700 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-0 focus:border-gray-500"
                                        required />
                                </div>
                            </section>


                        </div>
                        <div class="flex gap-6 w-full mb-6">
                            <section class="w-1/3 items-center">
                                <div class="flex flex-col">
                                    <label class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Tipo de Identificación
                                    </label>
                                    <select wire:model="datosPersonales.tipoIdentificacion" type='text'
                                        placeholder="Escribir aquí..."/
                                        class="hover:bg-gray-100 dark:hover:bg-gray-600 text-sm p-2 bg-white border border-gray-500 text-gray-700 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-0 focus:border-gray-500">
                                        <option value="">Seleccione...</option>
                                        <option>DNI</option>
                                        <option>Pasaporte</option>
                                    </select>
                                </div>
                            </section>

                            <section class="w-1/3 items-center">
                                <div class="flex flex-col">
                                    <label class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Estado Civil
                                    </label>
                                    <select wire:model="datosPersonales.estadoCivil" type="text"
                                        class="hover:bg-gray-100 dark:hover:bg-gray-600 text-sm p-2 bg-white border border-gray-500 text-gray-700 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-0 focus:border-gray-500">
                                        <option value="">Seleccione...</option>
                                        <option>Soltero/a</option>
                                        <option>Casado/a</option>
                                        <option>Divorciado/a</option>
                                        <option>Viudo/a</option>
                                        <option>Unión Libre</option>
                                    </select>
                                </div>
                            </section>
                            <section class="w-1/3 items-center">
                                <div class="flex flex-col">
                                    <label class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Fecha de Nacimiento
                                    </label>
                                    <input type="date" wire:model="datosPersonales.fechaNacimiento"
                                        class="hover:bg-gray-100 dark:hover:bg-gray-600 text-sm p-2 bg-white border border-gray-500 text-gray-700 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-0 focus:border-gray-500"
                                        required />
                                </div>
                            </section>
                        </div>
                        <div class="flex gap-6 w-full mb-6">
                            <section class="w-1/6 items-center">
                                {{-- Sexo --}}
                                <label
                                    class="flex justify-cernter text-center font-medium text-gray-900 dark:text-gray-300">
                                    Sexo
                                </label>
                                <div class="flex items-center h-full">
                                    <input type="radio" id="sexo_m" value="M"
                                        wire:model="datosPersonales.sexo"
                                        class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-600 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                    <label for="sexo_m"
                                        class="ml-1 font-medium text-gray-900 dark:text-gray-300">M</label>

                                    <input type="radio" id="sexo_f" value="F"
                                        wire:model="datosPersonales.sexo"
                                        class="ml-4 w-4 h-4 text-blue-600 bg-gray-200 border-gray-600 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                    <label for="sexo_f"
                                        class="ml-1 font-medium text-gray-900 dark:text-gray-300">F</label>
                                </div>
                            </section>
                            <section class="w-5/6 items-center">
                                <!-- LGBT Checkbox -->
                                <label class="block font-medium text-gray-900 dark:text-gray-300">
                                    LGBT
                                </label>
                                <div class="flex items-center h-full">
                                    <input type="checkbox" wire:model="datosPersonales.esLGBT"
                                        class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-600 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">¿Pertenece
                                        a la comunidad LGBT+?</label>
                                </div>
                            </section>
                        </div>
                    </main>
                    <footer class="flex justify-between items-center">
                        {{-- Mensaje de error al inicio --}}
                        <div>
                            @if (session('error'))
                                <label class="text-xs mb-2 font-medium text-red-500 dark:text-red-500">
                                    {{ session('error') }}
                                </label>
                            @endif
                        </div>

                        {{-- Botones siempre a la derecha --}}
                        <div class="flex gap-4">
                            <livewire:components.previous-step-button />
                            <livewire:components.next-step-button />
                        </div>
                    </footer>
                </section>
            @elseif ($step == 3)
                <section class="flex-col">

                    <header class="flex-col justify-center text-center mb-6">
                        <h3 class="text-lg font-semibold">
                            Registrar Familiar
                        </h3>
                    </header>

                    <main class="w-full flex flex-col justify-center text-sm mb-4">
                        <div
                            class="flex-col items-center text-center p-4 border-2 border-gray-400 rounded dark:border-gray-600">

                            ¿Tiene ya un familiar registrado?

                            <div class="flex-col items-center">
                                <input type="radio" id="familiar_si" name="tieneFamiliar" value="1"
                                    wire:model.live="tieneFamiliar"
                                    class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                <label for="familiar_si"
                                    class="ml-1 mr-3 font-medium text-gray-900 dark:text-gray-300">Sí</label>

                                <input type="radio" id="familiar_no" name="tieneFamiliar" value="0"
                                    wire:model.live="tieneFamiliar"
                                    class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-600">
                                <label for="familiar_no"
                                    class="ml-1 font-medium text-gray-900 dark:text-gray-300">No</label>
                            </div>


                        </div>

                        @if ($tieneFamiliar)

                            {{-- Información del familiar seleccionado --}}
                            @if ($familiar_seleccionado)

                                <div class="border border-gray-600 rounded mt-8 p-4 flex-col text-sm">

                                    <div class="flex justify-center mb-4 font-bold">
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
                                                    class="hover:bg-gray-300 bg-gray-200 text-gray-800 block dark:bg-slate-800 dark:placeholder-gray-400 dark:hover:bg-slate-700  dark:text-white border-none text-sm">
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
                                                class="ps-3 rounded-s text-gray-900 border-y border-gray-500 w-full bg-white focus:ring-gray-500 focus:border-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
                                        <div
                                            class="overflow-x-auto overflow-y-auto mt-4 rounded max-h-[180px] dark:scrollbar-thin dark:scrollbar-thumb-gray-600 dark:scrollbar-track-gray-800">
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

                    </main>
                    <footer class="flex justify-end gap-4">
                        {{-- Botones --}}

                        <livewire:components.previous-step-button>
                            <livewire:components.next-step-button>

                    </footer>
                </section>
            @elseif ($step == 4)
                <section class="flex-col">

                    <header class="flex-col justify-center text-center">
                        <h3 class="text-lg font-semibold mb-6">
                            Seleccione las Necesidades y Discapacidades que Posee
                        </h3>
                    </header>

                    <main class="w-full">
                        <div class="flex justify-center gap-20">
                            <!-- Necesidades a la izquierda -->
                            <div class="flex flex-col items-start w-1/2 dark:bg-gray-700 p-6">
                                <label class="text-lg mb-2 font-medium text-gray-900 dark:text-gray-300">
                                    Necesidades
                                </label>
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" class="mr-2"
                                        wire:model="migranteNecesidades.alojamiento">
                                    Alojamiento
                                </label>
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" class="mr-2" wire:model="migranteNecesidades.comida">
                                    Comida
                                </label>
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" class="mr-2" wire:model="migranteNecesidades.dinero">
                                    Dinero
                                </label>
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" class="mr-2" wire:model="migranteNecesidades.seguridad">
                                    Seguridad
                                </label>
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" class="mr-2"
                                        wire:model="migranteNecesidades.atencionMedica">
                                    Atención Médica
                                </label>
                            </div>

                            <!-- Discapacidades a la derecha -->
                            <div class="flex flex-col items-start w-1/2 dark:bg-gray-700 p-6">
                                <label
                                    class="text-lg mb-2 font-medium text-center flex text-gray-900 dark:text-gray-300">
                                    Discapacidades
                                </label>
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" class="mr-2"
                                        wire:model="migranteDiscapacidades.auditiva">
                                    Auditiva
                                </label>
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" class="mr-2"
                                        wire:model="migranteDiscapacidades.ceguera">
                                    Ceguera
                                </label>
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" class="mr-2" wire:model="migranteDiscapacidades.habla">
                                    Discapacidad de Habla
                                </label>
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" class="mr-2"
                                        wire:model="migranteDiscapacidades.sindromeDown">
                                    Síndrome de Down
                                </label>
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" class="mr-2"
                                        wire:model="migranteDiscapacidades.fractura">
                                    Fractura
                                </label>
                            </div>
                        </div>
                    </main>

                    <footer class="flex justify-end gap-4 mt-6">
                        {{-- Botones --}}
                        <livewire:components.previous-step-button>
                            <livewire:components.next-step-button>
                    </footer>

                </section>
            @elseif ($step == 5)
                <section class="flex-col">

                    <header class="flex-col justify-center text-center mb-8">
                        <h3 class="text-lg font-semibold mb-2">
                            Información de Ingreso y Motivos de Salida del País
                        </h3>

                    </header>

                    <main class="w-full">
                        <div class="flex justify-center gap-20">


                            <!-- Selects a la izquierda -->
                            <div class="flex flex-col items-start w-1/2">
                                <!-- Select de Frontera -->
                                <div class="flex flex-col mb-6 w-full">
                                    <label class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Seleccione la Frontera por la que ingresó al País
                                    </label>
                                    <select
                                        class="w-full hover:bg-gray-100 dark:hover:bg-gray-600 text-sm p-2 bg-white border border-gray-500 text-gray-700 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-0 focus:border-gray-500"
                                        wire:model="migrante.frontera">
                                        <option value="">Seleccione...</option>
                                        <option value="frontera1">Corinto</option>
                                        <option value="frontera2">El Amatillo</option>
                                        <option value="frontera3">La Fraternidad</option>
                                    </select>
                                </div>

                                <!-- Select de Entidad -->
                                <div class="flex flex-col mb-6 w-full">
                                    <label class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Seleccione la entidad que lo guió al centro
                                    </label>
                                    <select
                                        class="w-full hover:bg-gray-100 dark:hover:bg-gray-600 text-sm p-2 bg-white border border-gray-500 text-gray-700 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-0 focus:border-gray-500"
                                        wire:model="migrante.entidad">
                                        <option value="">Seleccione...</option>
                                        <option value="cruz_roja">Cruz Roja</option>
                                        <option value="policia">Policía</option>
                                        <option value="migracion">Migración</option>
                                        <option value="civil">Civil</option>
                                    </select>
                                </div>

                                <!-- Select de Estado Migratorio -->
                                <div class="flex flex-col w-full">
                                    <label class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300">
                                        Seleccione su estado Migratorio
                                    </label>
                                    <select
                                        class="w-full hover:bg-gray-100 dark:hover:bg-gray-600 text-sm p-2 bg-white border border-gray-500 text-gray-700 rounded dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-0 focus:border-gray-500"
                                        wire:model="migrante.estado">
                                        <option value="">Seleccione...</option>
                                        <option value="refugiado">Refugiado</option>
                                        <option value="solicitante_asilo">Solicitante de Asilo</option>
                                        <option value="migrante_transito">Migrante en Tránsito</option>
                                    </select>
                                </div>
                            </div>



                            <!-- Motivos de salida a la derecha -->
                            <div class="flex flex-col items-start w-1/2">
                                <label class="text-lg mb-2 font-medium text-gray-900 dark:text-gray-300">
                                    Motivos por los cuales salió del País
                                </label>
                                <label class="flex items-center mb-2 w-full">
                                    <input type="checkbox" class="mr-2"
                                        wire:model="migranteMotivos.persecucionPolitica">
                                    Persecución Política
                                </label>
                                <label class="flex items-center mb-2 w-full">
                                    <input type="checkbox" class="mr-2"
                                        wire:model="migranteMotivos.problemasEconomicos">
                                    Problemas Económicos
                                </label>
                                <label class="flex items-center mb-2 w-full">
                                    <input type="checkbox" class="mr-2"
                                        wire:model="migranteMotivos.abusoDirigentes">
                                    Abuso de Dirigentes
                                </label>
                                <label class="flex items-center mb-2 w-full">
                                    <input type="checkbox" class="mr-2"
                                        wire:model="migranteMotivos.reunionFamilia">
                                    Reunión con Familia
                                </label>
                                <label class="flex items-center mb-2 w-full">
                                    <input type="checkbox" class="mr-2"
                                        wire:model="migranteMotivos.violenciaDomestica">
                                    Violencia Doméstica
                                </label>
                            </div>
                        </div>
                    </main>

                    <footer class="flex justify-end gap-4 mt-6">
                        {{-- Botones --}}
                        <livewire:components.previous-step-button>
                            <livewire:components.next-step-button>
                    </footer>

                </section>


            @endif
        </div>
    </main>
</div>
