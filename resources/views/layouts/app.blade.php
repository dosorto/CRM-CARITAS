<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ÉXODO</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-neutral">

    {{-- Drawer --}}
    <div class="drawer sm:drawer-open">

        {{-- Input oculto para activar/desactivar la sidebar --}}
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />

        {{-- Contenido de la página --}}
        <div class="drawer-content flex flex-col items-center justify-center">
            <div class="flex justify-start w-full">
                <label for="my-drawer-2" class="btn drawer-button sm:hidden m-2 px-2 btn-accent text-base-content">
                    <span class="icon-[ri--menu-unfold-3-fill] size-10"></span>
                </label>
            </div>

            {{ $slot }}

        </div>

        {{-- Barra Lateral como tal (Por alguna razón está abajo) --}}
        <div class="drawer-side z-50">
            {{-- No se que hace este label --}}
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>

            {{-- Contenedor principal de la barra lateral --}}
            <div class="bg-primary text-base-content min-h-full w-64 flex flex-col">

                {{-- Logo de la Barra Lateral --}}
                <div class="px-4 pt-4">
                    <a href="#" class="flex items-center pl-2.5 w-full">
                        <img id="logo" src="/img/logo-white.png" class="h-16 me-6 sm:h-14" alt="Logo" />
                    </a>
                </div>


                {{-- Grupo de elementos de enlace --}}
                <div class="p-4 flex-grow text-primary-content">
                    <livewire:components.icon-link-group />
                </div>


                <div class="p-4 justify-center gap-4 flex">
                    <livewire:components.theme-switcher :customClass="'btn btn-primary px-3'" />
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 font-semibold btn btn-primary">
                            <span class="icon-[line-md--logout] size-7"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;600;700&display=swap');

        /* Configuración para usar la tipografía Figtree */
        body {
            font-family: 'Figtree', sans-serif;
        }
    </style>
</body>

</html>
