<div class="h-screen w-full flex flex-col bg-base-100">
    <header class="h-14 flex justify-between items-center p-4 shadow-md z-10">
        <h1 class="text-xl font-bold">Encuestas de Satisfacción</h1>
        <button onclick="document.getElementById('modal_habilitar').showModal()" class="btn btn-primary btn-sm">
            <span class="icon-[mdi--cog] size-4"></span>
            Administrar Cupos
        </button>
    </header>

    @if (session('exito'))
        <div class="toast toast-end z-50">
            <div class="alert alert-success shadow-lg">
                <span>{{ session('exito') }}</span>
            </div>
        </div>
    @endif

    <div class="flex flex-col justify-between h-full overflow-hidden">
        <main class="h-full grow w-full overflow-auto">

            {{-- Cards de información --}}
            <section class="flex w-full p-4 gap-4">
                <div class="flex py-3 bg-base-200 min-w-40 pl-5 rounded-lg shadow-md items-center w-2/5">
                    <span class="icon-[mingcute--happy-fill] size-8"></span>
                    <div class="flex flex-col ml-3">
                        <span class="text-sm font-semibold">Porcentaje de Satisfacción General:</span>
                        <span class="text-2xl font-semibold">{{ $satisfaccionGeneral }} %</span>
                    </div>
                </div>
                <div class="flex py-3 bg-base-200 min-w-40 pl-5 rounded-lg shadow-md items-center w-2/5">
                    <span class="icon-[ri--survey-fill] size-8"></span>
                    <div class="flex flex-col ml-3">
                        <span class="text-sm font-semibold">Encuestas totales realizadas:</span>
                        <span class="text-2xl font-semibold">{{ $totalEncuestas }}</span>
                    </div>
                </div>
                <div class="flex py-3 bg-base-200 min-w-40 pl-5 rounded-lg shadow-md items-center w-1/5">
                    <span class="icon-[mdi--clipboard-check] size-8"></span>
                    <div class="flex flex-col ml-3">
                        <span class="text-sm font-semibold">Cupos disponibles:</span>
                        <span class="text-2xl font-semibold {{ $cuposDisponibles > 0 ? 'text-success' : 'text-error' }}">
                            {{ $cuposDisponibles }}
                        </span>
                    </div>
                </div>
            </section>

            <section class="flex w-full px-4 gap-4">
                <div class="flex flex-col bg-base-200 min-w-40 rounded-lg shadow-md items-center w-3/5 p-4">
                    <h3 class="text-sm font-semibold pb-3">
                        Porcentaje de satisfacción de cada pregunta
                    </h3>
                    <div class="h-72 w-full rounded-lg overflow-auto">
                        <table class="table table-pin-rows">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th class="bg-accent">Indicador</th>
                                    <th class="bg-accent"># Si</th>
                                    <th class="bg-accent"># No</th>
                                    <th class="bg-accent rounded-tr-lg">Satisfacción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                @foreach ($kpis as $i => $kpi)
                                    <tr class="border-b-2 border-accent">
                                        <th class="flex items-center gap-1.5">
                                            <div class="tooltip tooltip-right tooltip-primary"
                                                data-tip="{{ $kpi->pregunta }}">
                                                <span class="icon-[pajamas--question] size-4 flex items-center"></span>
                                            </div>
                                            <span>
                                                {{ $kpi->kpi }}
                                            </span>
                                        </th>
                                        <td>{{ $kpi->cantidadSi }}</td>
                                        <td>{{ $kpi->cantidadNo }}</td>
                                        <td>{{ $kpi->porcentaje }} %</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex flex-col bg-base-200 min-w-40 rounded-lg items-center shadow-md w-2/5 p-4">
                    <h3 class="text-sm font-semibold pb-3">
                        Comentarios
                    </h3>

                    <section class="flex flex-col text-sm size-full h-72 overflow-auto">

                        @forelse ($comentarios as $id => $comentario)
                            <div class="flex border-2 border-accent w-full rounded-l-lg rounded-r-xl mb-5">
                                <span class="w-full flex items-center p-3">
                                    {{ $comentario->comentario }}
                                </span>
                                <span class="w-36 bg-accent px-3 py-1 flex justify-center items-center rounded-r-lg">
                                    <b>{{ $comentario->fecha }}</b>
                                </span>
                            </div>
                        @empty
                            <div class="size-full flex flex-col justify-center items-center grow">

                                <span class="tooltip tooltip-primary" data-tip="*Sonido de Grillo*">
                                    <span class="icon-[twemoji--cricket] size-10"></span>
                                </span>
                                <span>No hay comentarios...</span>
                            </div>
                        @endforelse
                    </section>
                </div>
            </section>
            {{-- Tabla para las preguntas --}}

        </main>
    </div>

    {{-- Modal Administrar Cupos --}}
    <dialog id="modal_habilitar" class="modal modal-bottom sm:modal-middle"
        x-data="{
            accion: 'sumar',
            cantidad: 1,
            actuales: {{ $cuposDisponibles }},
            get nuevoTotal() {
                if (this.accion === 'establecer') return this.cantidad;
                if (this.accion === 'sumar') return this.actuales + this.cantidad;
                return Math.max(0, this.actuales - this.cantidad);
            },
            get invalido() {
                if (this.cantidad < 1) return true;
                if (this.accion === 'restar' && this.cantidad > this.actuales) return true;
                return false;
            },
            aplicar() {
                $wire.set('accion', this.accion);
                $wire.set('cantidadCupos', this.cantidad);
                $wire.aplicarCupos();
            },
            labelBoton() {
                if (this.accion === 'establecer') return 'Establecer a ' + this.nuevoTotal;
                if (this.accion === 'sumar') return 'Sumar ' + this.cantidad;
                return 'Restar ' + this.cantidad;
            }
        }">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Administrar Cupos de Encuestas</h3>

            {{-- Cupo actual --}}
            <div class="flex items-center gap-3 mt-4 p-3 bg-base-200 rounded-lg">
                <span class="icon-[mdi--clipboard-text-outline] size-6 opacity-70"></span>
                <div class="flex flex-col">
                    <span class="text-xs opacity-60">Cupos disponibles actualmente</span>
                    <span class="text-2xl font-bold"
                        :class="{{ $cuposDisponibles }} > 0 ? 'text-success' : 'text-error'">
                        {{ $cuposDisponibles }}
                    </span>
                </div>
            </div>

            {{-- Cantidad --}}
            <div class="mt-4">
                <label class="floating-label">
                    <span>Cantidad</span>
                    <input type="number" x-model.number="cantidad" min="0"
                        placeholder="Cantidad"
                        class="input input-bordered w-full" />
                </label>
            </div>

            {{-- Botones de acción --}}
            <div class="flex gap-2 mt-4">
                <button class="btn btn-sm flex-1"
                    :class="accion === 'establecer' ? 'btn-primary' : 'btn-outline btn-primary'"
                    @click="accion = 'establecer'">
                    <span class="icon-[mdi--pencil] size-4"></span>
                    Establecer
                </button>
                <button class="btn btn-sm flex-1"
                    :class="accion === 'sumar' ? 'btn-success' : 'btn-outline btn-success'"
                    @click="accion = 'sumar'">
                    <span class="icon-[mdi--plus] size-4"></span>
                    Sumar
                </button>
                <button class="btn btn-sm flex-1"
                    :class="accion === 'restar' ? 'btn-error' : 'btn-outline btn-error'"
                    @click="accion = 'restar'">
                    <span class="icon-[mdi--minus] size-4"></span>
                    Restar
                </button>
            </div>

            {{-- Vista previa --}}
            <div class="mt-4 p-3 rounded-lg text-center"
                :class="invalido ? 'bg-error/10 border border-error' : 'bg-success/10 border border-success'">
                <span class="text-sm opacity-70">Nuevo total:</span>
                <span class="text-xl font-bold ml-2"
                    :class="invalido ? 'text-error' : 'text-success'" x-text="nuevoTotal"></span>
                <template x-if="accion === 'restar' && cantidad > actuales">
                    <div class="text-error text-xs mt-1">
                        No puede restar más de {{ $cuposDisponibles }} cupos
                    </div>
                </template>
                <template x-if="cantidad < 1">
                    <div class="text-error text-xs mt-1">
                        La cantidad debe ser al menos 1
                    </div>
                </template>
            </div>

            {{-- Errores de Livewire --}}
            @error('cantidadCupos')
                <div class="text-error text-xs mt-2">{{ $message }}</div>
            @enderror
            @error('accion')
                <div class="text-error text-xs mt-2">{{ $message }}</div>
            @enderror

            {{-- Acciones --}}
            <div class="modal-action">
                <button class="btn btn-ghost" onclick="document.getElementById('modal_habilitar').close()">Cancelar</button>
                <button class="btn btn-primary" :disabled="invalido" @click="aplicar()">
                    <span class="icon-[mdi--check-circle] size-4"></span>
                    <span x-text="labelBoton()"></span>
                </button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    @script
    <script>
        $wire.on('close-modal-habilitar', () => {
            document.getElementById('modal_habilitar').close();
        });
    </script>
    @endscript
</div>
