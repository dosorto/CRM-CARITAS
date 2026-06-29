<div class="h-screen size-full flex flex-col items-center bg-zinc-100 overflow-hidden sm:p-6" data-theme="light">

    <header class="bg-info flex items-center justify-between w-full sm:w-[768px] px-4 py-2 sm:rounded-t-2xl">
        <span class="text-white font-semibold">{{ $titulo[$idioma] }}</span>
        <div class="dropdown dropdown-left">
            <div tabindex="0" role="button" class="btn btn-info btn-sm">
                <span class="icon-[vs--language] size-4"></span>
                {{ $idioma }}
            </div>
            <ul tabindex="0"
                class="dropdown-content menu bg-white rounded-box z-[1] w-52 p-2 shadow font-semibold flex gap-1">
                <li><button wire:click="cambiarIdioma('Español')">
                        <span class="icon-[fxemoji--spanishflag] size-5"></span>Español
                    </button></li>
                <li><button wire:click="cambiarIdioma('English')">
                        <span class="icon-[fxemoji--greatbritainflag] size-5"></span>English
                    </button></li>
            </ul>
        </div>
    </header>

    @if ($encuestaCompletada)
        <div class="flex-1 flex flex-col items-center justify-center bg-white w-full sm:w-[768px] p-6 sm:rounded-b-2xl">
            <span class="icon-[mdi--check-circle] size-16 text-success mb-4"></span>
            <h2 class="text-xl font-bold text-center">
                {{ $idioma == 'Español' ? 'Encuesta completada' : 'Survey completed' }}
            </h2>
            <p class="text-sm opacity-70 text-center mt-2">
                {{ $idioma == 'Español'
                    ? 'Gracias por participar en nuestra encuesta de satisfacción. Su opinión nos ayuda a mejorar.'
                    : 'Thank you for participating in our satisfaction survey. Your feedback helps us improve.' }}
            </p>
            <button class="btn btn-success mt-6" onclick="window.close()">
                <span class="icon-[mdi--check] size-4"></span>
                {{ $idioma == 'Español' ? 'Cerrar' : 'Close' }}
            </button>
        </div>
    @elseif ($cuposDisponibles <= 0)
        <div class="flex-1 flex flex-col items-center justify-center bg-white w-full sm:w-[768px] p-6 sm:rounded-b-2xl">
            <span class="icon-[mdi--clipboard-off] size-16 text-error mb-4"></span>
            <h2 class="text-xl font-bold text-center">
                {{ $idioma == 'Español' ? 'No hay encuestas disponibles' : 'No surveys available' }}
            </h2>
            <p class="text-sm opacity-70 text-center mt-2">
                {{ $idioma == 'Español'
                    ? 'En este momento no hay cupos disponibles para realizar la encuesta. Por favor, intente más tarde.'
                    : 'There are no slots available to take the survey at this time. Please try again later.' }}
            </p>
        </div>
    @else
    <section class="flex-1 flex-col overflow-auto bg-white w-full sm:w-[768px] p-6">
        <p><b>{{ $instrucciones[$idioma]['instruccionTitle'] }}</b>
            {{ $instrucciones[$idioma]['instruccion'] }}</p>

        @foreach ($preguntas as $pregunta)
            <div class="border border-gray-400 rounded-xl p-4 mt-6">
                <span class="font-semibold">{{ $pregunta->id_kpi . '. ' . $pregunta->pregunta }}</span>
                <div class="h-max flex items-center gap-2 my-2">
                    <input type="radio" class="radio radio-success border-2" value="1"
                        wire:model="respuestas.{{ $pregunta->id_kpi }}" name="respuesta-{{ $pregunta->id_kpi }}">
                    <label class="font-bold">{{ $idioma == 'Español' ? 'Sí' : 'Yes' }}</label>
                </div>
                <div class="h-max flex items-center gap-2">
                    <input type="radio" class="radio radio-error border-2" value="0"
                        wire:model="respuestas.{{ $pregunta->id_kpi }}" name="respuesta-{{ $pregunta->id_kpi }}">
                    <label class="font-bold">No</label>
                </div>
            </div>
        @endforeach

        <div class="flex flex-col">


            <label class="p-1 font-semibold mt-4">
                {{ $idioma == 'Español' ? 'Comentarios Adicionales' : 'Additional Comments' }}
            </label>
            <textarea class="textarea textarea-bordered" rows="4" wire:model="comentarios"
                placeholder="{{ $idioma == 'Español' ? 'Escribir aquí...' : 'Write here...' }}">
                    </textarea>

            <label class="p-1 font-semibold mt-4">
                {{ $idioma == 'Español'
                    ? '¿Cuántas personas representa al llenar esta encuesta?'
                    : 'How many people are you representing in this survey?' }}
            </label>
            <input @class([
                'input input-bordered',
                'border-b-4 border-error' => $errors->has('cantidad'),
            ]) type="number" wire:model="cantidad" placeholder="000">
            </input>

            @error('cantidad')
                <div class="text-error mt-2 font-semibold">
                    {{ $message }}
                </div>
            @enderror

            @error('respuestas')
                <div class="text-error mt-2 font-semibold">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </section>
    <footer class="w-full sm:w-[768px] h-max p-4 bg-white sm:rounded-b-2xl border-t flex justify-between">
        <button class="btn btn-sm bg-base-100">Cancelar</button>
        <button class="btn btn-success btn-sm" wire:click="terminarEncuesta">
            Enviar
            <span class="icon-[bxs--send] size-4"></span>
        </button>
    </footer>
    @endif



    {{-- <article class="w-[48rem] max-h-[100vh] flex flex-col overflow-hidden grow pt-8">
        <main class="flex-1 bg-white border-2 border-white px-8 pt-6 rounded-b-2xl overflow-auto ">
            <div class="grow">
                <p>
                    <b>{{ $instrucciones[$idioma]['instruccionTitle'] }}</b>
                    {{ $instrucciones[$idioma]['instruccion'] }}
                </p>

                <hr class="border border-gray-400 mt-4">

                <div class="flex flex-col">
                    @foreach ($preguntas as $pregunta)
                        <div class="border border-gray-400 rounded-xl p-4 mt-6">
                            <span class="font-semibold">{{ $pregunta->id_kpi . '. ' . $pregunta->pregunta }}</span>
                            <div class="h-max flex items-center gap-2 my-2">
                                <input type="radio" class="radio radio-success border-2" value="1"
                                    wire:model="respuestas.{{ $pregunta->id_kpi }}"
                                    name="respuesta-{{ $pregunta->id_kpi }}">
                                <label class="font-bold">{{ $idioma == 'Español' ? 'Sí' : 'Yes' }}</label>
                            </div>
                            <div class="h-max flex items-center gap-2">
                                <input type="radio" class="radio radio-error border-2" value="0"
                                    wire:model="respuestas.{{ $pregunta->id_kpi }}"
                                    name="respuesta-{{ $pregunta->id_kpi }}">
                                <label class="font-bold">No</label>
                            </div>
                        </div>
                    @endforeach


                    <label class="p-1 font-semibold mt-4">
                        {{ $idioma == 'Español' ? 'Comentarios Adicionales' : 'Additional Comments' }}
                    </label>
                    <textarea class="textarea textarea-bordered" rows="4" wire:model="comentarios"
                        placeholder="{{ $idioma == 'Español' ? 'Escribir aquí...' : 'Write here...' }}">
                    </textarea>

                    <label class="p-1 font-semibold mt-4">
                        {{ $idioma == 'Español'
                            ? '¿Cuántas personas representa al llenar esta encuesta?'
                            : 'How many people are you representing in this survey?' }}
                    </label>
                    <input @class([
                        'input input-bordered',
                        'border-b-4 border-error' => $errors->has('cantidad'),
                    ]) type="number" wire:model="cantidad" placeholder="000">
                    </input>

                    @error('cantidad')
                        <div class="text-error mt-2 font-semibold">
                            {{ $message }}
                        </div>
                    @enderror

                    @error('respuestas')
                        <div class="text-error mt-2 font-semibold">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <hr class="border border-gray-400 mt-4">

            <footer class="w-full py-4 border-b-2 border-x-2 bg-white border-white flex">
                <button class="btn btn-info" wire:click="terminarEncuesta">
                    <span class="icon-[mdi--check-decagram] size-6"></span>
                    {{ $btnLabel[$idioma] }}
                </button>
            </footer>
        </main>
    </article>
    <section class="h-max w-full items-center p-4">
        <div class="dropdown dropdown-top">
            <div tabindex="0" role="button" class="btn btn-info">
                <span class="icon-[vs--language] size-6"></span>
                {{ $btnLanguageLabel[$idioma] }}{{ $idioma }}
            </div>
            <ul tabindex="0"
                class="dropdown-content menu bg-slate-300 rounded-box z-[1] w-52 p-2 shadow font-semibold">
                <li><button wire:click="cambiarIdioma('Español')">Español</button></li>
                <li><button wire:click="cambiarIdioma('English')">English</button></li>
            </ul>
        </div>
    </section> --}}
</div>
