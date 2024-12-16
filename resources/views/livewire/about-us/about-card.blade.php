<div class="flex flex-col">
    <article
        class="flex w-full h-64 bg-gray-100 shadow-[0_4px_6px_-1px_rgba(0,0,0,0.1)] hover:shadow-[0_10px_15px_-3px_rgba(0,0,0,0.1)] transition-shadow duration-100 overflow-hidden">

        <!-- Imagen del desarrollador -->
        <div class="w-1/3 flex items-center justify-center bg-white">
            <img src="{{ $foto }}" alt="dev" class="w-auto h-64 rounded-lg">
        </div>

        <!-- Información del desarrollador -->
        <div class="w-2/3 flex flex-col justify-center px-6 py-4">
            <h1 class="font-semibold text-2xl text-gray-800 mb-2"> {{ $nombre }}</h1>
            <p class="text-gray-600 text-lg">{{ $descripcion }}</p>
            <p class="text-gray-500 text-md mb-4">{{ $lugar }}</p>

            <!-- Enlace a LinkedIn -->
            <a href="{{ $linkedin }}" target="_blank"
                class="inline-flex items-center text-blue-500 hover:text-blue-700 font-medium gap-2 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6">
                    <path
                        d="M20.452 20.452h-3.555v-5.447c0-1.297-.026-2.967-1.807-2.967-1.808 0-2.085 1.41-2.085 2.868v5.546H9.451V9h3.414v1.561h.05c.476-.9 1.635-1.85 3.365-1.85 3.6 0 4.266 2.37 4.266 5.452v6.289zM5.337 7.433a2.065 2.065 0 1 1 0-4.13 2.065 2.065 0 0 1 0 4.13zM6.901 20.452H3.772V9h3.129v11.452z" />
                </svg>
                LinkedIn
            </a>
        </div>
    </article>
</div>
