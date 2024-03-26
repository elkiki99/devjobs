<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('mensaje'))
                <div class="text-sm text-green-600 dark:text-green-400 my-2 p-2">
                    {{ session('mensaje') }}
                </div>
            @endif

            <livewire:mostrar-vacantes />
        </div>
    </div>

</x-app-layout>