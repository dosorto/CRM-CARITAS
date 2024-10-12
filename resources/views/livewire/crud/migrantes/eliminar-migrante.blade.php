<x-modal>

    <x-slot name="title">
        <div class="flex justify-center">
            ¿Seguro de que desea eliminar del sistema a esta persona?
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="dark">
            <div class="mb-2 flex gap-2">
                <p class="font-bold">Nombre Completo:</p>
                <p> {{ $nombre_completo }} </p>
            </div>
            <div class="mb-2 flex gap-2">
                <p class="font-bold">Número de Identificacion: </p>
                <p> {{ $numero_identificacion }} </p>
                <p> ({{ $tipo_identificacion }})</p>
            </div>
            <div class="mb-2 flex gap-2">
                <p class="font-bold">Código Familiar:</p>
                <p> {{ $codigo_familiar }} </p>
            </div>
            <div class="mb-2 flex gap-2">
                <p class="font-bold">Pais:</p>
                <p> {{ $pais }} </p>
            </div>

        </div>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex mt-5 ml-2">
            <div class="flex justify-start gap-4">
                <button wire:click="eliminar"
                    class="bg-red-900 hover:bg-red-800 text-white py-2 px-5 rounded">Eliminar</button>
                <button wire:click="$dispatch('closeModal')"
                    class="bg-slate-700 hover:bg-slate-600 text-white py-2 px-5 rounded">Cancelar</button>
            </div>
        </div>
    </x-slot>
</x-modal>
