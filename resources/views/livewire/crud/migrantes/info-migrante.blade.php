<x-modal>

    <x-slot name="title">
        <div class="flex justify-center">
            Información
        </div>
    </x-slot>

    <x-slot name="content">
        <div>
            <div class="mb-2 flex gap-2">
                <p class="font-bold">Nombre:</p>
                <p>
                    {{ $migrante->primer_nombre .
                        ' ' .
                        $migrante->segundo_nombre .
                        ' ' .
                        $migrante->primer_apellido .
                        ' ' .
                        $migrante->segundo_apellido }}
                </p>
            </div>

            <div class="mb-2 flex gap-2">
                <p class="font-bold">Sexo:</p>
                <p> {{ $migrante->sexo == 'M' ? 'Masculino' : 'Femenino' }} </p>
            </div>

            <div class="mb-2 flex gap-2">
                <p class="font-bold">Documento de Identificación:</p>
                <p> {{ $migrante->tipo_identificacion }} </p>
            </div>

            <div class="mb-2 flex gap-2">
                <p class="font-bold">Número de Identificación:</p>
                <p> {{ $migrante->numero_identificacion }} </p>
            </div>

            <div class="mb-2 flex gap-2">
                <p class="font-bold">Fecha de Nacimiento:</p>
                <p> {{ \Carbon\Carbon::parse($migrante->fecha_nacimiento)->format('d-m-Y') }} </p>
            </div>

            <div class="mb-2 flex gap-2">
                <p class="font-bold">Pais de Procedencia:</p>
                <p> {{ $migrante->pais->nombre_pais }} </p>
            </div>

            <div class="mb-2 flex gap-2">
                <p class="font-bold">Estado Civil:</p>
                <p> {{ $migrante->estado_civil }} </p>
            </div>

            <div class="mb-2 flex gap-2">
                <p class="font-bold">Familia Número:</p>
                <p> {{ $migrante->codigo_familiar }} </p>
            </div>

            <div class="mb-2 flex gap-2">
                <p class="font-bold">Pertenece a la comunidad LGBT+: </p>
                <p> {{ $migrante->es_lgbt ? 'Si' : 'No' }} </p>
            </div>
        </div>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex mt-5 ml-2">
            <div class="flex justify-start gap-4">
                <button wire:click="$dispatch('closeModal')"
                    class="bg-slate-700 hover:bg-slate-600 text-white py-2 px-5 rounded">Cerrar</button>
            </div>
        </div>
    </x-slot>
</x-modal>
