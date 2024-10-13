{{-- Esta es la plantilla para darle forma a los modales --}}


@props(['formAction' => false])
<div class="dark w-full">

    {{-- Apertura de formulario en caso de que reciba el parámetro de form-action --}}
    @if ($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
    @endif

    {{-- Campo reservado para el título del modal --}}
    <div class="dark:bg-slate-800 dark:text-slate-300 p-4 sm:px-6 sm:py-4 border-b border-gray-150">
        @if (isset($title))
            <h3 class="text-lg leading-6 font-medium">
                {{ $title }}
            </h3>
        @endif
    </div>
    
    {{-- Campo reservado para el contenido --}}
    <div class="bg-white px-4 sm:p-6 dark:bg-slate-700 dark:text-slate-300">
        <div class="space-y-6">
            {{ $content }}
        </div>
    </div>

    {{-- Pie del modal, usualmente para los botones --}}
    <div class="bg-white px-4 pb-5 sm:px-4 sm:flex dark:bg-slate-800 dark:text-slate-300">
        {{ $buttons }}
    </div>

    {{-- Cierre de Formulario en caso de que se haya enviado el parámetro --}}
    @if ($formAction)
        </form>
    @endif

</div>
