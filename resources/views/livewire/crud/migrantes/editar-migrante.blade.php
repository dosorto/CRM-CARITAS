<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4">
        <h1 class="text-xl font-bold">Editar datos del Migrante</h1>
        <div class="flex gap-2">
            <button wire:click="guardar" wire:loading.attr="disabled" class="btn btn-sm btn-success text-success-content">
                <span wire:loading.remove wire:target="guardar" class="icon-[material-symbols--save] size-5"></span>
                <span wire:loading wire:target="guardar" class="loading loading-spinner loading-xs"></span>
                Guardar
            </button>
            <button wire:click="salir" class="btn btn-sm btn-accent text-base-content">
                <span class="icon-[mi--close] size-5"></span>
                Cancelar
            </button>
        </div>
    </header>

    <main class="grow overflow-y-auto w-full border-t-2 border-accent p-4 flex flex-col gap-4">

        @if (session('ok'))
            <div class="alert alert-success py-2">{{ session('ok') }}</div>
        @endif

        @error('numero_identificacion')<div class="alert alert-error py-2 text-sm">{{ $message }}</div>@enderror

        {{-- Datos personales --}}
        <article class="border-2 rounded-lg p-4 border-accent">
            <h2 class="font-semibold mb-3">Datos personales</h2>
            <div class="flex flex-wrap gap-6">
                <div>
                    <label class="text-sm p-1 font-semibold">Nombres</label>
                    <div class="flex gap-2 mt-1">
                        <input wire:model="primer_nombre" type="text" class="input bg-accent input-sm" placeholder="Primer nombre...">
                        <input wire:model="segundo_nombre" type="text" class="input bg-accent input-sm" placeholder="Segundo nombre...">
                    </div>
                </div>
                <div>
                    <label class="text-sm p-1 font-semibold">Apellidos</label>
                    <div class="flex gap-2 mt-1">
                        <input wire:model="primer_apellido" type="text" class="input bg-accent input-sm" placeholder="Primer apellido...">
                        <input wire:model="segundo_apellido" type="text" class="input bg-accent input-sm" placeholder="Segundo apellido...">
                    </div>
                </div>
                <div>
                    <label class="text-sm p-1 font-semibold">Fecha de nacimiento</label>
                    <input wire:model="fecha_nacimiento" type="date" class="input bg-accent input-sm mt-1 block">
                </div>
                <div>
                    <label class="text-sm p-1 font-semibold">Sexo</label>
                    <select wire:model="sexo" class="select bg-accent select-sm mt-1 block">
                        <option value="">Seleccione...</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
                <div>
                    <label class="text-sm p-1 font-semibold">Tipo de sangre</label>
                    <select wire:model="tipo_sangre" class="select bg-accent select-sm mt-1 block">
                        <option value="">Seleccione...</option>
                        @foreach (['O+','O-','A+','A-','B+','B-','AB+','AB-'] as $ts)
                            <option value="{{ $ts }}">{{ $ts }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </article>

        {{-- Identificación y origen --}}
        <article class="border-2 rounded-lg p-4 border-accent">
            <h2 class="font-semibold mb-3">Identificación y origen</h2>
            <div class="flex flex-wrap gap-6">
                <div>
                    <label class="text-sm p-1 font-semibold">Tipo de identificación</label>
                    <select wire:model="tipo_identificacion" class="select bg-accent select-sm mt-1 block">
                        <option value="">Seleccione...</option>
                        <option value="DNI">DNI</option>
                        <option value="Pasaporte">Pasaporte</option>
                        <option value="Cedula">Cédula</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div>
                    <label class="text-sm p-1 font-semibold">Número de identificación</label>
                    <input wire:model="numero_identificacion" type="text" maxlength="20" class="input bg-accent input-sm mt-1 block" placeholder="Número...">
                </div>
                <div>
                    <label class="text-sm p-1 font-semibold">País de origen</label>
                    <select wire:model="pais_id" class="select bg-accent select-sm mt-1 block">
                        <option value="">Seleccione...</option>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}">{{ $pais->nombre_pais }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </article>

        {{-- Estado civil y adicionales --}}
        <article class="border-2 rounded-lg p-4 border-accent">
            <h2 class="font-semibold mb-3">Estado civil y datos adicionales</h2>
            <div class="flex flex-wrap gap-6 items-end">
                <div>
                    <label class="text-sm p-1 font-semibold">Estado civil</label>
                    <select wire:model="estado_civil" class="select bg-accent select-sm mt-1 block">
                        <option value="">Seleccione...</option>
                        <option value="Soltero">Soltero/a</option>
                        <option value="Casado">Casado/a</option>
                        <option value="Union Libre">Unión libre</option>
                        <option value="Divorciado">Divorciado/a</option>
                        <option value="Viudo">Viudo/a</option>
                    </select>
                </div>
                <div>
                    <label class="text-sm p-1 font-semibold">Código familiar</label>
                    <input wire:model="codigo_familiar" type="number" min="0" class="input bg-accent input-sm mt-1 block" placeholder="Código...">
                </div>
                <label class="label cursor-pointer gap-2 justify-start">
                    <input wire:model="es_lgbt" type="checkbox" class="border-2 checkbox checkbox-sm checkbox-accent">
                    <span class="label-text">Pertenece a la comunidad LGBT</span>
                </label>
            </div>
        </article>

        @if ($expedienteId)
            {{-- Expediente --}}
            <article class="border-2 rounded-lg p-4 border-accent">
                <h2 class="font-semibold mb-3">Datos del expediente</h2>
                <div class="flex flex-wrap gap-6 mb-4">
                    <div>
                        <label class="text-sm p-1 font-semibold">Frontera</label>
                        <select wire:model="frontera_id" class="select bg-accent select-sm mt-1 block">
                            <option value="">Seleccione...</option>
                            @foreach ($fronteras as $f)
                                <option value="{{ $f->id }}">{{ $f->frontera }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-sm p-1 font-semibold">Asesor migratorio</label>
                        <select wire:model="asesor_migratorio_id" class="select bg-accent select-sm mt-1 block">
                            <option value="">Seleccione...</option>
                            @foreach ($asesores as $a)
                                <option value="{{ $a->id }}">{{ $a->asesor_migratorio }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-sm p-1 font-semibold">Situación migratoria</label>
                        <select wire:model="situacion_migratoria_id" class="select bg-accent select-sm mt-1 block">
                            <option value="">Seleccione...</option>
                            @foreach ($situaciones as $s)
                                <option value="{{ $s->id }}">{{ $s->situacion_migratoria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-sm p-1 font-semibold">Fecha de ingreso</label>
                        <input wire:model="fecha_ingreso" type="date" class="input bg-accent input-sm mt-1 block">
                    </div>
                    <div>
                        <label class="text-sm p-1 font-semibold">Fecha de salida</label>
                        <input wire:model="fecha_salida" type="date" class="input bg-accent input-sm mt-1 block">
                    </div>
                </div>

                <label class="text-sm p-1 font-semibold">Observación</label>
                <textarea wire:model="observacion" rows="2" maxlength="255" class="textarea bg-accent textarea-sm w-full mt-1" placeholder="Observaciones..."></textarea>

                <label class="label cursor-pointer gap-2 justify-start mt-2 w-fit">
                    <input wire:model="fallecimiento" type="checkbox" class="checkbox checkbox-sm checkbox-error border-2">
                    <span class="label-text">Fallecimiento</span>
                </label>
            </article>

            {{-- Servicios --}}
            <article class="border-2 rounded-lg p-4 border-accent">
                <h2 class="font-semibold mb-3">Servicios recibidos</h2>
                <div class="flex flex-wrap gap-6">
                    <label class="label cursor-pointer gap-2 justify-start">
                        <input wire:model="atencion_psicologica" type="checkbox" class="checkbox checkbox-sm checkbox-accent border-2">
                        <span class="label-text">Atención psicológica</span>
                    </label>
                    {{-- <label class="label cursor-pointer gap-2 justify-start">
                        <input wire:model="asesoria_psicologica" type="checkbox" class="checkbox checkbox-sm checkbox-accent">
                        <span class="label-text">Asesoría psicológica</span>
                    </label> --}}
                    <label class="label cursor-pointer gap-2 justify-start">
                        <input wire:model="atencion_legal" type="checkbox" class="checkbox checkbox-sm checkbox-accent border-2">
                        <span class="label-text">Atención legal</span>
                    </label>
                    <label class="label cursor-pointer gap-2 justify-start">
                        <input wire:model="asesoria_psicosocial" type="checkbox" class="checkbox checkbox-sm checkbox-accent border-2">
                        <span class="label-text">Asesoría psicosocial</span>
                    </label>
                </div>
            </article>

            {{-- Relaciones múltiples --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <article class="border-2 rounded-lg p-4 border-accent">
                    <h2 class="font-semibold mb-3">Motivos de salida del país</h2>
                    <div class="flex flex-col gap-1 max-h-64 overflow-y-auto">
                        @foreach ($motivosSalida as $m)
                            <label class="label cursor-pointer gap-2 justify-start py-1">
                                <input wire:model="motivos_salida" type="checkbox" value="{{ $m->id }}" class="checkbox checkbox-sm checkbox-accent border-2">
                                <span class="label-text">{{ $m->motivo_salida_pais }}</span>
                            </label>
                        @endforeach
                    </div>
                </article>

                <article class="border-2 rounded-lg p-4 border-accent">
                    <h2 class="font-semibold mb-3">Necesidades</h2>
                    <div class="flex flex-col gap-1 max-h-64 overflow-y-auto">
                        @foreach ($necesidadesList as $n)
                            <label class="label cursor-pointer gap-2 justify-start py-1">
                                <input wire:model="necesidades" type="checkbox" value="{{ $n->id }}" class="checkbox checkbox-sm checkbox-accent border-2">
                                <span class="label-text">{{ $n->necesidad }}</span>
                            </label>
                        @endforeach
                    </div>
                </article>

                <article class="border-2 rounded-lg p-4 border-accent">
                    <h2 class="font-semibold mb-3">Discapacidades</h2>
                    <div class="flex flex-col gap-1 max-h-64 overflow-y-auto">
                        @foreach ($discapacidadesList as $d)
                            <label class="label cursor-pointer gap-2 justify-start py-1">
                                <input wire:model="discapacidades" type="checkbox" value="{{ $d->id }}" class="checkbox checkbox-sm checkbox-accent border-2">
                                <span class="label-text">{{ $d->discapacidad }}</span>
                            </label>
                        @endforeach
                    </div>
                </article>
            </div>
        @else
            <div class="alert alert-warning">
                Este migrante no tiene un expediente asociado. Sólo se editarán sus datos personales.
            </div>
        @endif
    </main>
</div>
