<main class="flex-grow overflow-hidden flex flex-col">

    <section class="flex justify-between my-4 items-center">
        <h2 class="text-lg">
            <strong>Paso 3:</strong> Registrar Familia
        </h2>
        <livewire:components.forms.steps :currentStep="3" :steps="4">
    </section>

    <article class="flex-grow flex overflow-hidden rounded-lg border-2 border-accent">

        {{-- Seccion de preguntas y tabla de búsqueda --}}
        <section class="w-3/5 overflow-y-auto">
            <div class="flex flex-col h-max">

                {{-- Preguntas --}}
                <section class="flex p-4">
                    {{-- Pregunta de Viaja en Grupo --}}
                    <div class="flex flex-col w-1/3">
                        <label>¿Viaja en Grupo?</label>
                        <div class="flex gap-2 mt-2 items-center">

                            <label>Si</label>
                            <input wire:model.live.debounce.100ms="viajaEnGrupo" value="1" type="radio"
                                class="radio radio-sm border-2 mr-2" name="viajaEnGrupo">

                            <label>No</label>
                            <input wire:model.live.debounce.100ms="viajaEnGrupo" value="0" type="radio"
                                class="radio radio-sm border-2" name="viajaEnGrupo">
                        </div>
                    </div>

                    {{-- Pregunta de Tiene Familiar --}}
                    <div class="flex flex-col w-2/3">
                        <label>¿Tiene ya un familiar Registrado?</label>
                        <div class="flex gap-2 mt-2 items-center">

                            <label>Si</label>
                            <input wire:model.live.debounce.100ms="tieneFamiliar" value="1" type="radio"
                                class="radio radio-sm border-2 mr-2" name="tieneFamiliar"
                                @if (!$viajaEnGrupo) disabled @endif>

                            <label>No</label>
                            <input wire:model.live.debounce.100ms="tieneFamiliar" value="0" type="radio"
                                class="radio radio-sm border-2" name="tieneFamiliar"
                                @if (!$viajaEnGrupo) disabled @endif>
                        </div>
                    </div>
                </section>


                {{-- Tabla y buscador en caso de que tenga Familiar. --}}
                <section class="mt-2  @if (!$tieneFamiliar || !$viajaEnGrupo) hidden @endif">

                    {{-- Buscador --}}
                    <div class="flex px-4 mb-4 mt-2">
                        <div class="join w-full">
                            <select wire:model.live.debounce.100ms="colSelected"
                                class="select select-sm join-item w-min bg-accent">
                                <option value="nombre_completo">Nombre</option>
                                <option value="identificacion">Identificación</option>
                            </select>
                            <label
                                class="w-full input input-sm join-item bg-neutral border-2 border-accent input-bordered flex items-center justify-between gap-2">
                                <input wire:model.live.debounce.200ms="textToFind" placeholder="Buscar..."
                                    type="text" />

                                {{-- Lógica para mostrar el ícono de carga o el ícono de búsqueda --}}
                                <span wire:loading.remove class="icon-[map--search] size-4 text-gray-400"></span>
                                <span wire:loading class="loading loading-dots"></span>
                                {{-- <span class="loading loading-dots loading-md"></span> --}}
                            </label>
                        </div>
                    </div>


                    {{-- Tabla --}}
                    <div class="flex flex-col">


                        <div class="rounded-lg border-2 border-accent">
                            <table class="table table-sm w-full table-pin-rows">
                                <thead class="text-sm border-b-2 border-accent">
                                    <th class="bg-accent">
                                        Nombre
                                    </th>
                                    <th class="bg-accent">
                                        Identificación
                                    </th>
                                    <th class="bg-accent">
                                        País
                                    </th>
                                    <th class="bg-accent">Opciones</th>
                                </thead>
                                <tbody>

                                    @if (!$personas)
                                        <tr class="border-b border-accent">
                                            <td colspan="4" class="text-center py-4">
                                                <strong>* Sonido de Grillos *</strong>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($personas as $persona)
                                            <tr wire:key="{{ $persona->id }}" class="border-b border-accent">
                                                <td>
                                                    {{ $persona->primer_nombre .
                                                        ' ' .
                                                        $persona->segundo_nombre .
                                                        ' ' .
                                                        $persona->primer_apellido .
                                                        ' ' .
                                                        $persona->segundo_apellido }}
                                                </td>
                                                <td>
                                                    {{ $persona->numero_identificacion }}
                                                </td>
                                                <td>
                                                    {{ $persona->pais->nombre_pais }}
                                                </td>
                                                <td class="flex w-max gap-2">
                                                    <div class="tooltip" data-tip="Seleccionar">
                                                        <button wire:click="selectRelated({{ $persona->id }})"
                                                            class="items-center btn btn-xs btn-accent text-base-content">
                                                            <span
                                                                class="icon-[ic--round-navigate-next] size-4 text-base-content"></span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
        </section>
        <section class="w-2/5 h-full bg-accent flex flex-col ">

            {{-- Caso en que viaje en grupo y ya tenga familiar registrado --}}
            @if ($tieneFamiliar && $viajaEnGrupo)
                @if ($familiar)
                    <div class="flex flex-col overflow-auto p-6">
                        <h4 class="text-xl text-center mb-4">
                            Datos del Familiar
                        </h4>
                        <hr class="border border-base-100">
                        <p class="mt-4">
                            <strong>Nombre Completo:</strong>
                        </p>
                        <p class="ml-4">
                            {{ $familiar->primer_nombre .
                                ' ' .
                                $familiar->segundo_nombre .
                                ' ' .
                                $familiar->primer_apellido .
                                ' ' .
                                $familiar->segundo_apellido }}
                        </p>
                        <p class="mt-4">
                            <strong>Pais de Procedencia:</strong>
                        </p>
                        <p class="ml-4">
                            {{ $familiar->pais->nombre_pais }}
                        </p>
                        <p class="mt-4">
                            <strong>Número de Identificación:</strong>
                        </p>
                        <p class="ml-4">
                            {{ $familiar->numero_identificacion }}
                        </p>
                        <p class="mt-4">
                            <strong>Código Familiar:</strong>
                        </p>
                        <p class="ml-4">
                            {{ $familiar->codigo_familiar }}
                        </p>
                    </div>
                @else
                    <div class="flex items-center h-full justify-center">

                        <span class="icon-[material-symbols--question-mark] size-20"></span>
                    </div>
                    <div class="flex flex-col items-center justify-end text-center p-8 h-max">
                        <span class="icon-[fa--long-arrow-left]"></span>
                        Seleccione un familiar en la tabla de la izquierda
                    </div>
                @endif
            @else<div class="p-5 text-lg flex flex-col items-center justify-center size-full">
                    <strong>Nuevo Código Familiar:</strong>
                    <p>{{ $codigoFamiliar }}</p>
                    <hr class="border border-base-content w-4/5 mt-6">
                    <p class="mt-6 text-sm text-center mx-4">
                        Este registro no será tomado en cuenta para datos estadísticos de familiares
                    </p>
                </div>

            @endif


        </section>
    </article>

    <footer class="py-4 border-t border-accent mb-0 flex gap-4 justify-end">
        <livewire:components.buttons.previous-step-button />
        <livewire:components.buttons.next-step-button />
    </footer>
</main>
