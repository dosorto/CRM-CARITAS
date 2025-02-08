<div>
    {{-- Botón para activar el Modal --}}

    <label for="{{ $idModal }}-{{ $persona->id }}" class="btn btn-{{ $btnSize }} btn-accent text-base-content">
        <span class="icon-[flowbite--info-circle-solid] size-{{ $iconSize }}"></span>
        {{ $label }}
    </label>

    {{-- Modal --}}
    <input type="checkbox" id="{{ $idModal }}-{{ $persona->id }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box w-max h-max max-w-5xl bg-neutral border-2 border-accent">

            {{-- Título del Modal --}}
            <h3 class="text-xl font-bold text-center mb-4">Información Personal</h3>

            {{-- Contenido --}}
            <main class="h-max flex flex-col w-full text-base items-start gap-2 text-start">
                <span>
                    <b>Nombre Completo: </b>
                    {{ $persona->primer_nombre . ' ' . $persona->segundo_nombre . ' ' . $persona->primer_apellido . ' ' . $persona->segundo_apellido }}
                </span>
                <span>
                    <b>Identificación: </b>
                    {{ $persona->numero_identificacion }}
                </span>
                <span>
                    <b>Sexo: </b>
                    {{ $persona->sexo === 'M' ? 'Masculino' : 'Femenino' }}
                </span>
                <span>
                    <b>Estado Civil: </b>
                    {{ $persona->estado_civil }}
                </span>
                <span>
                    <b>País de Procedencia: </b>
                    {{ $persona->pais->nombre_pais }}
                </span>
                <span>
                    <b>Código Familiar: </b>
                    {{ $persona->codigo_familiar }}
                </span>
                <span>
                    <b>Fecha de Nacimiento: </b>
                    {{ $persona->fecha_nacimiento }}
                </span>
                <span>
                    <b>Grupo Sanguíneo: </b>
                    {{ $persona->tipo_sangre }}
                </span>
            </main>

            <div class="modal-action">
                <label for="{{ $idModal }}-{{ $persona->id }}" class="btn btn-accent text-base-content">Cerrar</label>
            </div>
        </div>
    </div>
</div>
