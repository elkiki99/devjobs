<div>
    <livewire:filtrar-vacantes />   
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-bold text-3xl color-gray-500 mb-12 md:text-left md:mx-5 text-center dark:text-gray-200">
                Nuestras últimas vacantes
            </h3>

            <div class="p-6 shadow-sm rounded-lg bg-white divide-y divide-gray-200 dark:bg-gray-800">
                @forelse ($vacantes as $vacante)
                    <div class="py-5 md:flex md:justify-between md:items-center">
                        <div>
                            <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold dark:text-gray-200">
                                {{ $vacante->titulo }}
                            </a>
        
                            <p class="text-lg text-gray-600 font-medium mt-0.5 dark:text-gray-300"> {{ $vacante->empresa }} </p>
                            <p class="text-xl text-gray-800 font-extrabold mt-0.5 dark:text-gray-200"> {{ $vacante->salario->salario }} </p>
                            <p class="text-sm text-gray-500 font-bold mt-0.5 dark:text-gray-400"> {{ $vacante->categoria->categoria }} </p>
                            <p class="text-xs text-gray-500 mt-0.5"> Hasta {{ $vacante->validez->format('d/m/Y') }}</p>
                        </div>

                        <div class="mt-5 md:mt-0">
                            <a class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ route('vacantes.show', $vacante->id) }}">
                                Ver vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600 dark:text-gray-400">No hay vacantes aún</p>
                @endforelse
            </div>
            <div class="my-5">
                {{ $vacantes->links() }}
            </div>
        </div>
    </div>
</div>
