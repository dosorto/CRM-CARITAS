<div class="h-screen w-full flex flex-col">
    <header class="h-[10%] flex justify-between items-center p-4 border-b border-gray-600">
        <h1 class="text-xl font-bold">Administración de Módulos</h1>
        <div>
            <!-- Espacio para cosas adicionales -->
        </div>
    </header>

    <main class="overflow-auto size-full p-4 flex gap-6 flex-wrap">
        <section class="flex flex-col border-2 border-accent size-max rounded-lg">
            <h4 class="font-semibold py-2 px-4 bg-accent rounded-t text-center">
                Expedientes
            </h4>
            <div class="flex flex-col gap-4 flex-wrap max-w-max p-3">
                <a href="{{ route('ver-discapacidades') }}"
                    class="btn btn-sm btn-accent w-max flex flex-col hover:scale-105">
                    <span class="icon-[material-symbols--accessibility-rounded] size-5"></span>
                    <span>Discapacidades</span>
                </a>

                <a href="{{ route('ver-situaciones-migratorias') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[fa6-solid--person-walking-luggage] size-5"></span>
                    <span>Situaciones Migratorias</span>
                </a>

                <a href="{{ route('ver-asesores-migratorios') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[tabler--navigation-heart] size-5"></span>
                    <span>Asesores Migratorios</span>
                </a>

                <a href="{{ route('ver-fronteras') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[maki--police] size-5"></span>
                    <span>Fronteras</span>
                </a>

                <a href="{{ route('ver-motivos') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[streamline--travel-airport-earth-airplane-travel-plane-trip-airplane-international-adventure-globe-world] size-6"></span>
                    <span>Motivos de Salida del País</span>
                </a>

                <a href="{{ route('ver-necesidades') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[hugeicons--bubble-chat-favourite] size-6"></span>
                    <span>Necesidades</span>
                </a>

                <a href="{{ route('ver-faltas') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[fluent--clipboard-error-16-filled] size-6"></span>
                    <span>Faltas Disciplinarias</span>
                </a>

            </div>
        </section>

        <section class="flex flex-col border-2 border-accent size-max rounded-lg">
            <h4 class="font-semibold py-2 px-4 bg-accent rounded-t text-center">
                Usuarios
            </h4>
            <div class="flex flex-col gap-4 flex-wrap max-w-max p-3">
                <a href="{{ route('ver-usuarios') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[fa6-solid--users-gear] size-5"></span>
                    <span>Usuarios</span>
                </a>
                <a href="{{ route('ver-roles') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[ic--sharp-manage-accounts] size-5"></span>
                    <span>Roles</span>
                </a>
            </div>
        </section>

        <section class="flex flex-col border-2 border-accent size-max rounded-lg">
            <h4 class="font-semibold py-2 px-4 bg-accent rounded-t text-center">
                Donaciones
            </h4>
            <div class="flex flex-col gap-4 flex-wrap max-w-max p-3">
                <a href="{{ route('ver-donantes') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[streamline--give-gift-solid] size-5"></span>
                    <span>Donantes</span>
                </a>
                <a href="{{ route('ver-tipo-donantes') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[fa-solid--hands-helping] size-5"></span>
                    <span>Tipos de Donantes</span>
                </a>
            </div>
        </section>

        <section class="flex flex-col border-2 border-accent size-max rounded-lg">
            <h4 class="font-semibold py-2 px-4 bg-accent rounded-t text-center">
                Inventario
            </h4>
            <div class="flex flex-col gap-4 flex-wrap max-w-max p-3">
                <a href="{{ route('ver-articulos') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[material-symbols--sanitizer-rounded] size-5"></span>
                    <span>Artículos</span>
                </a>
                <a href="{{ route('ver-mobiliarios') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[icon-park-solid--bedside-two] size-5"></span>
                    <span>Mobiliario</span>
                </a>
            </div>
        </section>

        <section class="flex flex-col border-2 border-accent size-max rounded-lg">
            <h4 class="font-semibold py-2 px-4 bg-accent rounded-t text-center">
                Regiones
            </h4>
            <div class="flex flex-col gap-4 flex-wrap max-w-max p-3">
                <a href="{{ route('ver-paises') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[clarity--flag-solid] size-5"></span>
                    <span>Países</span>
                </a>
                <a href="{{ route('ver-departamentos') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[fluent--location-ripple-16-filled] size-5"></span>
                    <span>Departamentos</span>
                </a>
                <a href="{{ route('ver-departamentos') }}" class="btn btn-sm btn-accent w-max flex flex-col">
                    <span class="icon-[solar--city-bold] size-5"></span>
                    <span>Ciudades</span>
                </a>
            </div>
        </section>
    </main>


    {{-- Footer fijo en la parte inferior --}}
    <footer class="h-auto flex justify-start bg-neutral text-base-content p-4">
        <aside>

        </aside>
    </footer>
</div>
