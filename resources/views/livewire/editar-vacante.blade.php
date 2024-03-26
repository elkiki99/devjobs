
<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <div class="mt-4">
        <x-input-label for="titulo" :value="__('Título vacante')" />
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            {{-- name="titulo"  --}}
            wire:model="titulo"
            :value="old('titulo')"
            placeholder="Título de la vacante"
        />

        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="salario" :value="__('Salario mensual (en $USD)')" />
        <x-select 
            class="block mt-1 w-full" 
            id="salario" 
            wire:model.fill="salario"
        >
            <option value="" selected disabled>--Selecciona un rango de precio--</option>
            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </x-select>

        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="categoria" :value="__('Categoría')" />
        <x-select 
            class="block mt-1 w-full" 
            id="categoria"
            wire:model.fill="categoria"
        >
            <option value="" selected disabled>--Selecciona una categoría--</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
        @endforeach
        </x-select>

        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            {{-- name="empresa" --}}
            wire:model="empresa"
            :value="old('empresa')"
            placeholder="Empresa: ej. Netflix, Uber, Google"
        />

        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="validez" :value="__('Válido hasta')" />
        <x-text-input 
            id="validez" 
            class="block mt-1 w-full" 
            type="date" 
            {{-- name="validez"  --}}
            wire:model="validez"
            :value="old('validez')"
        />

        <x-input-error :messages="$errors->get('validez')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="descripcion" :value="__('Descripción')" />
        <x-textarea
            placeholder="Descripción general del puesto, experiencia, responsabilidades, requerimientos, beneficios."
            class="w-full h-72"
            {{-- name="descripcion" --}}
            wire:model="descripcion"
        ></x-textarea>

        <x-input-error :messages="$errors->get('descripcio')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            name="imagen"
            wire:model="imagen_nueva"
            accept="image/*"

        />

        <div class="my-5 w-96">
            <x-input-label :value="__('Imagen actual')" />

            <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="{{'Imagen vacante ' . $titulo}}">
        </div>

        <div class="my-5 w-96">
            @if($imagen_nueva)
                Imagen nueva:
                <img src="{{ $imagen_nueva->temporaryUrl() }}">
            @endif
        </div>

        <x-input-error :messages="$errors->get('imagen_nueva')" class="mt-2" />
    </div>

    <x-primary-button>
        {{ __('Actualizar vacante') }}
    </x-primary-button>
</form>