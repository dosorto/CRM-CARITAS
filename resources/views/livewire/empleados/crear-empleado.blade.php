<div class="w-full flex justify-center">
    <div class="relative p-8 w-full max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-6 border-b rounded-t dark:border-gray-600">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Agregar Empleado
                </h3>
                <button type="button" wire:click="toEmpleados()"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-8 space-y-8">
                <form class="max-w-4xl mx-auto space-y-8">
                    <div class="grid md:grid-cols-3 gap-8">
                        <div>
                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input wire:model="nombre" type="text" id="nombre"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                            <p class="text-red-600 font-semibold italic">@error('nombre') {{ $message }} @enderror</p>
                        </div>
                        <div>
                            <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                            <input wire:model="apellido" type="text" id="apellido"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                            <p class="text-red-600 font-semibold italic">@error('apellido') {{ $message }} @enderror</p>
                        </div>
                        <div>
                            <label for="identidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">N. Identidad</label>
                            <input wire:model="identidad" type="text" id="identidad"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                            <p class="text-red-600 font-semibold italic">@error('identidad') {{ $message }} @enderror</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <div>
                            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                            <input wire:model="telefono" type="text" id="telefono"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                            <p class="text-red-600 font-semibold italic">@error('telefono') {{ $message }} @enderror</p>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input wire:model="email" type="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                            <p class="text-red-600 font-semibold italic">@error('email') {{ $message }} @enderror</p>
                        </div>
                        <div>
                            <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de nacimiento</label>
                            <input wire:model="fecha_nacimiento" type="date" id="fecha_nacimiento"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                            <p class="text-red-600 font-semibold italic">@error('fecha_nacimiento') {{ $message }} @enderror</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <label for="departamento_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccionar departamento</label>
                            <select wire:model="departamento_id" id="departamento_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Seleccione</option>
                                @foreach ($departamentos as $item )
                                <option value="{{ $item->id }}">{{ $item->nombre_departamento }}</option>
                                @endforeach
                            </select>
                            <p class="text-red-600 font-semibold italic">@error('departamento_id') {{ $message }} @enderror</p>
                        </div>
                        <div>
                            <label for="estado_civil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccionar estado civil</label>
                            <select wire:model="estado_civil" id="estado_civil"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Seleccione</option>
                                <option value="Soltero">Soltero</option>
                                <option value="Casado">Casado</option>
                            </select>
                            <p class="text-red-600 font-semibold italic">@error('estado_civil') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="flex items-center justify-end p-6 border-t border-gray-200 rounded-b dark:border-gray-600 space-x-4">
                <button type="button" wire:click.prevent="agregarEmpleado()"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar</button>
                <button type="button" wire:click="toEmpleados()"
                    class="py-3 px-6 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
            </div>
        </div>
    </div>
</div>
