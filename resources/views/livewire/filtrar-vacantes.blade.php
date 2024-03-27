<div class="bg-gray-100 py-10 dark:bg-gray-800">
    <h2 class="text-2xl md:text-4xl text-gray-800 text-center font-bold my-5 dark:text-gray-200">Buscar y Filtrar Vacantes</h2>

    <div class="mt-5 max-w-7xl mx-auto dark:bg-gray-800">
        <form wire:submit.prevent="leerDatosBuscador">
            <div class=" m-5 md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <x-input-label
                        for="termino">Término de Búsqueda
                    </x-input-label>
                    <x-text-input
                        wire:model="termino" 
                        id="termino"
                        type="text"
                        placeholder="Buscar por término: ej. Laravel"
                        class="block mt-1 w-full"
                    />
                </div>

                <div class="mb-5">
                    <x-input-label
                        for="categorias">Categoría
                    </x-input-label>
                    <x-select wire:model.fill="categoria" id="categoria" class="block mt-1 w-full">
                        <option value="" selected disabled>-- Seleccione --</option>
            
                        @foreach ($categorias as $categoria )
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mb-5">
                    <x-input-label
                        for="salario">Salario Mensual
                    </x-input-label>
                    <x-select wire:model.fill="salario" id="salario" class="border-gray-300 p-2 w-full">
                        <option value="" selected disabled>-- Seleccione --</option>
                        @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">{{$salario->salario}}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="flex mx-5 justify-end">
                <input
                    type="submit"
                    value="Buscar"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 hover:cursor-pointer"
                />
            </div>
        </form>
    </div>
</div>


{{-- @push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.hook('message.processed', () => {
                // Asegúrate de reemplazar 'categoria' y 'salario' con los ID correctos de tus selects
                const categoriaSelect = document.getElementById('categoria');
                const salarioSelect = document.getElementById('salario');

                // Agrega el atributo 'selected' a la opción por defecto si no hay una opción seleccionada
                if (!categoriaSelect.value) {
                    categoriaSelect.querySelector('option[disabled]').setAttribute('selected', true);
                }

                if (!salarioSelect.value) {
                    salarioSelect.querySelector('option[disabled]').setAttribute('selected', true);
                }
            });
        });
    </script>
@endpush --}}