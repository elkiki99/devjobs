<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-400">
                    <h1 class="text-2xl font-bold text-center my-10">Mis notificaciones</h1>
                    
                    <div class="divide-y divide-gray-200">
                        @forelse ($notificaciones as $notificacion)
                            <div class="p-5 my-2 md:flex justify-between items-center">
                                <div>
                                    <p>Tienes un nuevo candidato en
                                        <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                    </p>
                                    <p>
                                        <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                                <div class="mt-3 md:mt-0">
                                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}">
                                        Ver candidatos
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600 mb-5">No tienes nuevas notificaciones</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout> 