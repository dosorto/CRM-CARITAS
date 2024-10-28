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
                        <label>¿Tiene ya un familiar Registrado??</label>
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
                                <option value="nombres">Nombres</option>
                                <option value="apellidos">Apellidos</option>
                                <option value="identificacion">Identificación</option>
                            </select>
                            <label
                                class="w-full input input-sm join-item bg-neutral border-2 border-accent input-bordered flex items-center justify-between gap-2">
                                <input wire:model.live.debounce.1000ms="textToFind" placeholder="Buscar..."
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
                                        Nombre Completo
                                    </th>
                                    <th class="bg-accent">
                                        Identificación
                                    </th>
                                    <th class="bg-accent">
                                        País
                                    </th>
                                    <th class="bg-accent">Seleccionar</th>
                                </thead>
                                <tbody>

                                    @if (!$persons)
                                        <tr class="border-b border-accent">
                                            <td colspan="4" class="text-center py-4">
                                                <strong>* Sonido de Grillos *</strong>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($persons as $person)
                                            <tr wire:key="{{ $person->id }}" class="border-b border-accent">
                                                <td>
                                                    Mario Fernando Carbajal Galo
                                                </td>
                                                <td>
                                                    0601200303381
                                                </td>
                                                <td>
                                                    Honduras
                                                </td>
                                                <td class="w-max">
                                                    <div class="tooltip w-max" data-tip="Seleccionar">
                                                        <button wire:click="selectRelated({{ $person }})"
                                                            class="items-center btn btn-xs btn-accent">
                                                            <span class="icon-[ic--round-navigate-next] size-4 text-base-content"></span>
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
            <div class="flex-1 overflow-auto pt-4">
                <h4 class="text-xl text-center">
                    Datos del Familiar
                </h4>
            </div>

            <div class="p-5 text-lg">
                <strong>Código Familiar: </strong> 1
            </div>
        </section>
    </article>



    <footer class="py-4 border-t border-accent mb-0 flex gap-4 justify-end">
        <livewire:components.buttons.previous-step-button />
        <livewire:components.buttons.next-step-button />
    </footer>
</main>
