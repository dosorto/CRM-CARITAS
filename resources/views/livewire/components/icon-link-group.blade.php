<div class="flex flex-col">
    @can('Ver Dashboard')
        <a href="/inicio" class="btn btn-primary w-full flex justify-start">
            <span class="icon-[solar--pie-chart-3-bold] size-6"></span>
            Estadísticas
        </a>
    @endcan
    {{-- Aqui va el permiso --}}
    <a href="{{ route('migrantes') }}" class="btn btn-primary w-full flex justify-start">
        <span class="icon-[fa-solid--users] size-6"></span>
        Migrantes
    </a>
    
    <a href="{{ route('administracion') }}" class="btn btn-primary w-full flex justify-start">
        <span class="icon-[fluent--document-settings-16-regular] size-6"></span>
        Administración
    </a>

    <a href="{{ route('actas') }}" class="btn btn-primary w-full flex justify-start">
        <span class="icon-[mi--document] size-6"></span>
        Actas y Solicitudes
    </a>
    <a href="{{ route('donaciones') }}" class="btn btn-primary w-full flex justify-start">
        <span class="icon-[bx--donate-heart] size-5"></span>
        Donaciones
    </a>
    <a href="{{ route('reportes') }}" class="btn btn-primary w-full flex justify-start">
        <span class="icon-[lucide--file-chart-column] size-6"></span>
        Reportes
    </a>
</div>
