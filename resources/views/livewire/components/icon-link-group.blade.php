<div class="flex flex-col">

    <a href="{{ route('inicio') }}" class="btn btn-primary w-full flex justify-start">
        <span class="icon-[solar--pie-chart-3-bold] size-6"></span>
        Estadísticas
    </a>

    @canany(['ver-migrantes', 'registrar-migrantes', 'registrar-salida-de-migrante'])
        <a href="{{ route('migrantes') }}" class="btn btn-primary w-full flex justify-start">
            <span class="icon-[fa-solid--users] size-6"></span>
            Migrantes
        </a>
    @endcanany

    <a href="{{ route('administracion') }}" class="btn btn-primary w-full flex justify-start">
        <span class="icon-[fluent--document-settings-16-regular] size-6"></span>
        Administración
    </a>

    @canany(['ver-actas-de-entrega', 'ver-solicitudes-de-traslado', 'ver-solicitudes-de-insumos'])
        <a href="{{ route('actas') }}" class="btn btn-primary w-full flex justify-start">
            <span class="icon-[mi--document] size-6"></span>
            Actas y Solicitudes
        </a>
    @endcanany
    @canany(['ver-donaciones', 'registrar-donacion', 'ver-donaciones'])
        <a href="{{ route('donaciones') }}" class="btn btn-primary w-full flex justify-start">
            <span class="icon-[bx--donate-heart] size-5"></span>
            Donaciones
        </a>
    @endcanany
    @canany(['generar-reportes-de-migrantes'])
        <a href="{{ route('reportes') }}" class="btn btn-primary w-full flex justify-start">
            <span class="icon-[lucide--file-chart-column] size-6"></span>
            Reportes
        </a>
    @endcanany
</div>
