<div class="h-screen w-full flex flex-col px-5">

    {{-- Título y cosa extra --}}
    <header class="h-max flex justify-between items-center border-b-2 border-accent py-4">
        <h1 class="text-xl font-bold"> {{ session('titulo') }} </h1>
        <div>
            @if (session()->has('message') && session()->has('alertIcon') && session()->has('type'))
                <div role="alert"
                    class="alert {{ session('type') }} w-max text-white pl-2 pr-4 py-1 rounded-lg shadow-lg fixed top-4 right-4 z-50">
                    <span class="icon-[{{ session('alertIcon') }}]"></span>
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </header>

    {{-- Pasos --}}
    @switch(session('currentStep'))
        @case(1)
            <livewire:crud.migrantes.form.identificacion-step>
            @break

            @case(2)
                <livewire:crud.migrantes.form.datos-personales-step>
                @break

                @case(3)
                    <livewire:crud.migrantes.form.familiar-step>
                    @break

                    @case(4)
                        <livewire:crud.migrantes.form.datos-migratorios-step>
                        @break

                        @case(5)
                            <livewire:crud.migrantes.form.situacion-step>
                            @break
                        @endswitch

</div>
