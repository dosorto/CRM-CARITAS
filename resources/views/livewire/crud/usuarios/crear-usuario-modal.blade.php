<div>
    <!-- El botón para abrir el modal -->
    <label for="{{ $idModal }}" class="btn btn-accent">
        <span class="icon-[mdi--plus-circle] size-5"></span>
        Crear
    </label>

    <input type="checkbox" id="{{ $idModal }}" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box h-full max-w-5xl flex flex-col bg-neutral">
            <h3 class="text-lg font-bold text-center">Crear Usuario</h3>
            <main class="overflow-auto grow my-4">
                <div class="flex flex-col">
                    <div class="flex gap-16 h-full">
                        <div class="w-1/2 flex flex-col gap-4">
                            <div class="flex gap-8 w-full">
                                <div class="w-full flex flex-col">
                                    <label class="p-1 font-semibold text-sm">Primer Nombre:</label>
                                    <input wire:model="nombre" class="input input-sm input-bordered bg-accent"
                                        type="text" placeholder="Escribir Aquí..." />
                                    @error('nombre')
                                        <span class="text-error text-xs font-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full flex flex-col">
                                    <label class="p-1 font-semibold text-sm">Primer Apellido:</label>
                                    <input wire:model="apellido" class="input input-sm input-bordered bg-accent"
                                        type="text" placeholder="Escribir Aquí..." />
                                    @error('apellido')
                                        <span class="text-error text-xs font-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex gap-8">
                                <div class="flex flex-col w-full">
                                    <label class="p-1 font-semibold text-sm">Número de Identidad:</label>
                                    <input wire:model="identidad" class="input input-sm input-bordered bg-accent"
                                        type="text" placeholder="Escribir Aquí..." />
                                    @error('identidad')
                                        <span class="text-error text-xs font-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-full">
                                    <label class="p-1 font-semibold text-sm">Teléfono Celular:</label>
                                    <input wire:model="telefono" class="input input-sm input-bordered bg-accent"
                                        type="text" placeholder="Escribir Aquí..." />
                                    @error('telefono')
                                        <span class="text-error text-xs font-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex gap-8">
                                <div class="flex flex-col w-full">
                                    <label class="p-1 font-semibold text-sm">Fecha de Nacimiento:</label>
                                    <input wire:model="fechaNacimiento" class="input input-sm input-bordered bg-accent"
                                        type="date" placeholder="Escribir Aquí..." />
                                    @error('fechaNacimiento')
                                        <span class="text-error text-xs font-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-full">
                                    <label class="p-1 font-semibold text-sm">Estado Civil:</label>
                                    <select wire:model="estadoCivil" class="select select-sm select-bordered bg-accent"
                                        type="text" placeholder="Escribir Aquí...">
                                        <option value="">Seleccione...</option>
                                        <option>Casado/a</option>
                                        <option>Soltero/a</option>
                                        <option>Divorciado/a</option>
                                        <option>Viudo/a</option>
                                        <option>Unión Libre</option>
                                    </select>
                                    @error('estadoCivil')
                                        <span class="text-error text-xs font-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="w-1/2 flex flex-col gap-3">

                            <label class="font-semibold text-sm">Seleccione los roles del Usuario:</label>
                            @error('selectedRoles')
                                <span class="text-error text-xs font-semibold">{{ $message }}</span>
                            @enderror
                            <div
                                class="rounded-lg border-2 border-accent px-3 p-2 flex flex-col overflow-auto max-h-44">
                                <!-- Cambios clave -->
                                @foreach ($roles as $rol)
                                    <div class="flex items-center gap-2">
                                        <input type="checkbox" id="{{ $rol->id }}" wire:model="selectedRoles"
                                            value="{{ $rol->id }}"
                                            class="checkbox checkbox-sm checkbox-base-content border-2 border-gray-500" />
                                        <label for="{{ $rol->id }}" class="label">{{ $rol->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-4">
                        <div class="flex flex-col w-1/2 pr-8">
                            <label class="p-1 font-semibold text-sm">Correo Electrónico:</label>
                            <input wire:model="correo" class="input input-sm input-bordered bg-accent" type="email"
                                placeholder="Escribir Aquí..." />
                            @error('correo')
                                <span class="text-error text-xs font-semibold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex gap-8 pl-8 w-1/2">
                            <div class="flex flex-col w-full">
                                <label class="p-1 font-semibold text-sm">Contraseña:</label>
                                <input wire:model="password" class="input input-sm input-bordered bg-accent"
                                    type="password" placeholder="Escribir Aquí..." />
                                @error('password')
                                    <span class="text-error text-xs font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col w-full">
                                <label class="p-1 font-semibold text-sm">Confirmar Contraseña:</label>
                                <input wire:model="confirmPassword" class="input input-sm input-bordered bg-accent"
                                    type="password" placeholder="Escribir Aquí..." />
                                @error('confirmPassword')
                                    <span class="text-error text-xs font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <div class="modal-action">
                <button class="btn btn-success" wire:click="crearUsuario">
                    <span class="icon-[mdi--content-save] size-5"></span>
                    Guardar
                </button>
                <button for="{{ $idModal }}" class="btn btn-accent" wire:click="cerrarModal">
                    <span class="icon-[f7--xmark] size-5"></span>
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('cerrar-modal', () => {
            document.getElementById('{{ $idModal }}').checked = false;
        });
    </script>
@endscript
