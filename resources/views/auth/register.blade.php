<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Hiring or Searching -->
        <div class="mt-4">
            <x-input-label for="rol" :value="__('Tipo de cuenta')" />

            <x-select class="block mt-1 w-full" id="rol" name="rol">
                <option value="" selected disabled>--Selecciona un rol--</option>
                <option value="1">Recruiter - Publicar empleos</option>
                <option value="2">Developer - Obtener empleo</option>
            </x-select>

            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Repetir Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex gap-2 justify-between mt-4">
            <x-link
                :href="route('login')"
            >
                ¿Ya tienes cuenta?
            </x-link>


            <x-link
            :href="route('password.request')"
            >
                ¿Olvidaste tu password?
            </x-link>
        </div>

        <x-primary-button class="mt-4 w-full justify-center">
            {{ __('Registrarme') }}
        </x-primary-button>
    </form>
</x-guest-layout>
