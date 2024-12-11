<label>
    <a href="{{ route($route) }}" class="btn {{ $cardWidth }} h-full active:scale-95 hover:scale-105 shadow-lg rounded-lg p-0 bg-accent border-accent hover:border-accent">
        <div class="card bg-base-100 rounded-lg {{ $cardWidth }}">
            <div class="card-body flex flex-row justify-center p-4">

                <div class="flex justify-center items-center">

                    <span class="{{ $iconClass }} text-base-content"></span>
                </div>

                <h2 class="card-title">
                    <p class="text-base-content text-lg items-center justify-center">
                        {{ $title }}
                    </p>
                </h2>
            </div>
        </div>
    </a>
</label>
