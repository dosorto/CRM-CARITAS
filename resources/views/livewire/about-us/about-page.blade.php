<div class="w-full h-max bg-white">
    {{-- Seccion de logo --}}
    <section class="w-full h-screen flex items-center justify-center bg-cover bg-center"
        style="background-image: url('/img/FONDO.png');">
        <a href="{{route('inicio')}}" class="items-center flex justify-center">
            <img src="/img/LOGO1-WHITE.png" alt="logo-exodo-blanco" style="max-width: 40%; height: auto;">
        </a>
    </section>

    {{-- Seccion acerca del proyecto --}}
    <section class="relative w-full h-screen flex flex-col items-center justify-center bg-cover bg-center"
        style="background-image: url('/img/about-us/bg2.jpg');">

        <!-- Capa azul semitransparente -->
        <div class="absolute inset-0 bg-gray-900 opacity-90"></div>

        <!-- Contenido de la sección -->
        <div class="relative z-10 text-white text-center">
            <h1 class="font-bold text-3xl">
                ¿Por qué ÉXODO?
            </h1>
            <div class="text-2xl py-12 px-12 lg:px-72 flex flex-col gap-4 font-semibold">
                <p>
                    ÉXODO es un nombre que simboliza el movimiento de personas
                    que, en situaciones difíciles, deben abandonar su hogar en busca
                    de una vida mejor.
                </p>
                <p>
                    El sistema de Gestión Migratoria "ÉXODO" refleja esta realidad al
                    acompañar y apoyar a los migrantes en su tránsito, ofreciendo
                    soluciones para gestionar su información y necesidades,
                    asegurando que se respete su dignidad y derechos.
                </p>
            </div>
        </div>
    </section>

    <!-- Sección de desarrolladores con scroll -->
    <section class="w-full h-max pb-16">
        <div class="flex flex-col w-full h-max">

            <div class="my-16">
                <h1 class="text-center font-bold text-3xl md:text-4xl text-gray-800">
                    El Equipo Detrás de ÉXODO
                </h1>
                <p class="text-center text-lg text-gray-600 mt-4">
                    Comprometidos a transformar ideas en soluciones
                </p>
            </div>

            <div class="w-full flex flex-col gap-16">
                @foreach ($devs as $data)
                    <livewire:about-us.about-card 
                        foto="{{ $data['foto'] }}"
                        nombre="{{ $data['nombre'] }}"
                        descripcion="{{ $data['descripcion'] }}"
                        lugar="{{ $data['lugar'] }}"
                        linkedin="{{ $data['linkedin'] }}"
                    >
                    @endforeach
                </div>
        </div>
    </section>

</div>
