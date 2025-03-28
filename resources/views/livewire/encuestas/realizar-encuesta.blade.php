<div class="h-screen size-full flex flex-col items-center bg-zinc-100 overflow-hidden">
    <article class="w-[48rem] max-h-[100vh] flex flex-col overflow-hidden grow pt-8">
        <header class="p-4 bg-info rounded-t-2xl text-white font-bold text-lg text-center">
            <span>{{ $titulo[$idioma] }}</span>
        </header>
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

                    @error('respuestas')
                        <div class="text-error mt-2">
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
            <div tabindex="0" role="button" class="btn btn-accent">
                <span class="icon-[vs--language] size-6"></span>
                {{ $btnLanguageLabel[$idioma] }}{{ $idioma }}
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                <li><button wire:click="cambiarIdioma('Español')">Español</button></li>
                <li><button wire:click="cambiarIdioma('English')">English</button></li>
            </ul>
        </div>
    </section>
</div>
