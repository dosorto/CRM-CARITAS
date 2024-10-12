<x-modal>

    <x-slot name="title">
        <div class="flex justify-center">
            ¿Está seguro de que desea eliminar esta ciudad?
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="dark">
            <div class="mb-2 flex gap-2">
                <p class="font-bold">Nombre de la ciudad: </p>
                {{ $nombre_ciudad }}
            </div>
        </div>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex gap-4 mt-4 ml-2">
            <button wire:click="eliminar"
                class="bg-red-900 hover:bg-red-800 text-white py-2 px-5 rounded">Eliminar</button>
            <button wire:click="$dispatch('closeModal')"
                class="bg-slate-700 hover:bg-slate-600 text-white py-2 px-5 rounded">Cancelar</button>
        </div>
    </x-slot>

</x-modal>
