<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tus candidatos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-gray-200">
                    <h1 class="text-2xl font-bold text-center my-10">
                        Candidatos para {{$vacante->titulo}}
                    </h1>
                </div>

                <div class="p-5 md:flex md:justify-center">
                    <ul class="divide-y divide-gray-200 w-full">
                        @forelse ($vacante->candidatos as $candidato)
                            <li class="p-3 flex items-center">
                                <div class="flex-1">
                                    <p class="text-xl font-medium text-gray-800">{{$candidato->user->name}}</p>
                                    <p class="text-sm font-medium text-gray-600">{{$candidato->user->email}}</p>
                                    <p class="text-sm font-bold text-gray-600">{{$candidato->user->created_at->diffForHumans()}}</p>
                                </div>

                                <div>
                                    <a target="blank" rel="noreferrer noopener" href="{{ asset('storage/cv/' . $candidato->cv) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Ver C.V</a>
                                </div>
                            </li>
                        @empty
                            <p class="text-center mb-5">Aún no hay candidatos postulados a esta vacante</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>