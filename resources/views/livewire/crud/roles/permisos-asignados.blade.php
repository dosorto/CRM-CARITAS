{{-- El encabezado y el <form> del modal se encuentra en la carpeta --}}
{{-- resources/views/components/modal.blade.php --}}

{{-- con form-action le indicamos al componente padre la accion que realizaremos con el formulario --}}
<x-modal>

    <x-slot name="title">
        Permisos Asignados
    </x-slot>

    <x-slot name="content">
        <div class="dark flex-col justify-between">
            @foreach ($permisos as $permiso)
                <div class="mt-4">
                    {{ $permiso }}
                </div>
            @endforeach

        </div>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex gap-4 mt-4 ml-2">
            <button wire:click="$dispatch('closeModal')" type="reset"
                class="bg-slate-700 hover:bg-slate-600 text-white py-2 px-5 rounded">Regresar</button>
        </div>
    </x-slot>

</x-modal>
