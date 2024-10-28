<div>
    <div class="relative min-h-screen bg-cover bg-center" style="background-image: url('/img/FONDO.png');">
        <div class="flex flex-col items-center justify-center min-h-screen bg-gray-900 bg-opacity-50">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="/img/recurso.png" alt="Logo" class="w-96 h-auto">
            </div>
            <div class="w-full max-w-md p-6 bg-white bg-opacity-90 rounded-lg shadow-lg">

                <!-- Título -->
                <h2 class="mb-4 text-2xl font-semibold text-center text-gray-800">Iniciar Sesión</h2>

                <!-- Formulario -->
                @if (session()->has('error'))
                    <div class="p-2 mb-4 text-center text-red-600 bg-red-100 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <form wire:submit.prevent="login" class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                        <input type="email" id="email" wire:model="email"
                            class="w-full px-4 py-2 mt-1 text-gray-800 bg-gray-200 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" id="password" wire:model="password"
                            class="w-full px-4 py-2 mt-1 text-gray-800 bg-gray-200 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('password')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full py-2 font-semibold text-neutral btn btn-primary">
                        Ingresar
                    </button>
                </form>
            </div>
        </div>
    </div>


</div>
