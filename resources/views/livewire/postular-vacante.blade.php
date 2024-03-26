
<div class="bg-gray-50 p-5 flex flex-col justify-center items-center mt-10 rounded-md">

    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @if(session()->has('mensaje'))
        <p class="text-sm text-green-600 dark:text-green-400 my- p-1">
            {{ session('mensaje') }}
        </p>

    @else
        <form wire:submit.prevent="postularme" class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum vitae (PDF)')"/>
                <x-text-input wire:model="cv" id="cv" type="file" accept=".pdf" />
            </div>

            @error('cv')
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            @enderror

            <x-primary-button class="my-5 w-full justify-center">
                {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif
</div>
