<main class="size-full flex">

    {{-- Sección de preguntas y tabla de personas en caso de familiar ya registrado --}}
    <section class="w-2/3 h-full flex flex-col overflow-hidden">

        {{-- Preguntas --}}
        <div class="flex w-full border-b-4 rounded-box border-accent p-4">
            <div class="w-1/2 flex flex-col items-center border-e-4 border-accent">
                <label class="p-1 font-semibold mb-2">¿Viaja en grupo o en familia?</label>
                <div class="flex gap-6 font-bold">
                    <div class="flex gap-2">
                        <input wire:model.live="viajaEnGrupo" value="1" type="radio"
                            class="radio border-2 radio-success" name="viajaEnGrupo">
                        Si
                    </div>
                    <div class="flex gap-2">
                        <input wire:model.live="viajaEnGrupo" value="0" type="radio"
                            class="radio border-2 radio-error" name="viajaEnGrupo">
                        No
                    </div>
                </div>
            </div>
            <div class="w-1/2 flex flex-col items-center">
                <label class="p-1 font-semibold mb-2 {{ !$viajaEnGrupo ? 'opacity-30' : '' }}">¿Tiene ya un familiar
                    registrado?</label>
                <div class="flex gap-6 font-bold">
                    <div class="flex gap-2">
                        <input wire:model.live="tieneFamiliar" value="1" type="radio"
                            class="radio border-2 radio-success" name="tieneFamiliar" @disabled(!$viajaEnGrupo)>
                        <p class="{{ !$viajaEnGrupo ? 'opacity-30' : '' }}">Si</p>
                    </div>
                    <div class="flex gap-2">
                        <input wire:model.live="tieneFamiliar" value="0" type="radio"
                            class="radio border-2 radio-error" name="tieneFamiliar" @disabled(!$viajaEnGrupo)>
                        <p class="{{ !$viajaEnGrupo ? 'opacity-30' : '' }}">No</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabla para buscar en caso de que ya tenga un familiar registrado --}}
        @if ($viajaEnGrupo && $tieneFamiliar)
            <div class="overflow-auto">
                <div class="px-4 pt-4 join w-full {{ empty($personas) ? 'hidden' : '' }}">
                    <select wire:model.live="colSelected" class="select-sm select join-item w-min bg-accent">
                        <option>Identificación</option>
                        <option>Nombre</option>
                    </select>
                    <div
                        class="w-full input-sm input join-item bg-neutral border-2 border-accent flex items-center justify-between gap-2">
                        <input wire:model.live.debounce.300ms="textToFind" placeholder="Buscar..." type="text"
                            class="w-full" />

                        {{-- Lógica para mostrar el ícono de cargando o el ícono de búsqueda --}}
                        <span wire:loading.remove class="icon-[map--search] size-4 text-gray-400"></span>
                        <span wire:loading class="loading loading-dots loading-sm"></span>
                    </div>
                </div>
                <div class="m-4">
                    @if (!empty($personas))
                        <table class="table table-sm w-full table-pin-rows">
                            <thead>
                                <tr class="bg-accent text-sm border-b border-accent">
                                    <th class="rounded-tl-lg">Nombre</th>
                                    <th>Identificación</th>
                                    <th class="rounded-tr-lg">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Listado de personas --}}
                                @for ($i = 0; $i <= 30; $i++)
                                    <tr class="border-b border-accent">
                                        <td>Nombre...</td>
                                        <td>Identificación...</td>
                                        <td class="flex gap-2">
                                            <button class="btn btn-xs btn-accent text-base-content">
                                                Sel.
                                            </button>
                                            <button class="btn btn-xs btn-accent text-base-content">
                                                info.
                                            </button>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    @else
                        <div class="text-center p-6 w-full">

                            <p class="flex flex-col gap-3 items-center">
                                {{-- <span class="font-semibold">*Sonido de Grillos*</span> --}}
                                <span class="tooltip tooltip-primary tooltip-right" data-tip="*Sonido de Grillo*">
                                    <span class="icon-[twemoji--cricket] size-8"></span>
                                </span>

                                <span class="text-error font-semibold">No hay personas registradas.</span>

                                <span>Si esta persona viaja sola, seleccione <b>"No"</b> en la pregunta:
                                    <b>¿Viaja en Grupo?</b>
                                    Para NO asignarle código familiar.</span>

                                <span>Si es la primera persona de un grupo o familia en registrarse,
                                    seleccione <b>"No"</b> en la pregunta:
                                    <b>¿Tiene ya un familiar registrado?</b> para generar un nuevo código
                                    familiar y relacionar a los siguientes miembros a registrarse.</span>
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </section>

    {{-- Sección de información y código familiar --}}
    <section class="w-1/3 h-full bg-accent flex flex-col p-8">

        {{-- En caso de que ya tenga un familiar registrado --}}
        @if ($tieneFamiliar && !$familiarSeleccionado)
            <div class="grow items-center flex justify-center">
                <span class="icon-[material-symbols--question-mark] size-20"></span>
            </div>

            <div class="flex flex-col gap-2 text-center items-center">
                <span class="icon-[fa--long-arrow-left]"></span>
                Seleccione un familiar en la tabla de la izquierda.
            </div>
        @elseif ($familiarSeleccionado)
            Familiar ya seleccionado, datos personales:
        @elseif (!$viajaEnGrupo)
            <div class="text-center size-full content-center font-semibold">
                Este registro <b>NO</b> será tomado en cuenta para datos estadísticos de familias.
            </div>
        @elseif ($viajaEnGrupo && !$tieneFamiliar)
            <div class="size-full font-semibold flex flex-col gap-4 justify-center text-center">
                <span>Se generó un nuevo Código Familiar: {{ $codigoFamiliar }}</span>
                Los siguientes miembros del grupo o familia serán relacionados mediante este código al identificar a
                esta persona.
            </div>
        @else
            <div class="text-center size-full content-center font-semibold text-error">
                Algo salió mal... <br>
                Por favor, reinicie el formulario.
            </div>
        @endif
        {{-- Este condicional es para que desaparezca el mensaje cuando se cambian las preguntas --}}
        @if ($errorFamiliar)
            @error('familiarSeleccionado')
                <p class="text-error font-semibold text-center mt-4 p-2 border-2 border-error rounded-box">
                    {{ $message }}</p>
            @enderror
        @endif
    </section>
</main>
