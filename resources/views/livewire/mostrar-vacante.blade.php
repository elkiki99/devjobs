<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacante->titulo }}
        </h3>

        <div class="md:grid md:grid-cols-2">
            <p class="font-bold text-sm text-gray-800 my-3">Empresa:
                <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
            </p>

            <p class="font-bold text-sm text-gray-800 my-3">Válido hasta:
                <span class="normal-case font-normal">{{ $vacante->validez->toFormattedDateString() }}</span>
            </p>

            <p class="font-bold text-sm text-gray-800 my-3">Categoría:
                <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
            </p>

            <p class="font-bold text-sm text-gray-800 my-3">Salario:
                <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4 pt-2">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantes/' . $vacante->imagen)}}" alt="{{'Imagen vacante ' . $vacante->titulo}}">
        </div>

        <div class="md:col-span-4 md:pt-0 pt-5">
            <h2 class="text-2xl font-bold mb-5">Descripción del puesto:</h2>
            <p>{!! nl2br(e($vacante->descripcion)) !!}</p>
        </div>
    </div>

    @guest
        <div class="mt-10 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Desea aplicar a esta vacante? <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obten una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
    @endguest
    
    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot
</div>
