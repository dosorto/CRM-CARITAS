<div class="w-full flex justify-center">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Agregar Empleado
                </h3>
                <button type="button" wire:click="toEmpleados()"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-1 space-y-4">

                <form class="max-w-sm mx-auto">
                    <div class="grid md:grid-cols-3 md:gap-6">
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input  wire:model="nombre" type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            <p class="text-red-600 font-semibold italic">
                                @error('nombre')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>
                          <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                            <input wire:model="apellido" type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            <p class="text-red-600 font-semibold italic">
                                @error('apellido')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">N. Identidad</label>
                            <input  wire:model="identidad" type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            <p class="text-red-600 font-semibold italic">
                                @error('identidad')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>
                      </div>

                      <div class="grid md:grid-cols-3 md:gap-6">

                          <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                            <input wire:model="telefono" type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            <p class="text-red-600 font-semibold italic">
                                @error('telefono')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Email</label>
                            <input wire:model="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            <p class="text-red-600 font-semibold italic">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de nacimiento</label>
                            <input  wire:model="fecha_nacimiento" type="date" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
                            <p class="text-red-600 font-semibold italic">
                                @error('fecha_nacimiento')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>
                      </div>
                      <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="mb-5">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccionar departamento</label>
                            <select wire:model="departamento_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                              <option selected>Seleccione</option>
                              @foreach ($departamentos as $item )
                              <option value="{{ $item->id }}">{{ $item->nombre_departamento }}</option>
                              @endforeach
                            </select>
                            <p class="text-red-600 font-semibold italic">
                                @error('departamento_id')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="mb-5">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccionar estado civil</label>
                            <select wire:model="estado_civil" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                              <option selected>Seleccione</option>
                              <option value="Soltero">Soltero</option>
                              <option value="Casado">Casado</option>
                            </select>
                            <p class="text-red-600 font-semibold italic">
                                @error('departamento_id')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>
                      </div>

                    </form>


            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" wire:click.prevent="agregarEmpleado()"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar</button>
                <button data-modal-hide="default-modal" type="button" wire:click="toEmpleados()"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
            </div>
        </div>
    </div>
</div>
