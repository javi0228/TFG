<x-guest-layout>
    <form enctype="multipart/form-data" method="POST" class="grid grid-cols-1 sm:grid-cols-2"
        action="{{ route('register') }}">
        @csrf
        {{-- Primera columna --}}
        <div class="grid grid-cols-2 gap-4">
            <!-- Email Address -->
            <div class="mt-4 col-span-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Surname -->
            <div>
                <x-input-label for="surname" :value="__('Surname')" />
                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')"
                    required autofocus autocomplete="surname" />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <!-- DNI -->
            <div>
                <x-input-label for="dni" :value="__('DNI')" />
                <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')"
                    required autofocus autocomplete="dni" />
                <x-input-error :messages="$errors->get('dni')" class="mt-2" />
            </div>

            {{-- Fecha nacimineto --}}
            <div>
                <x-datetime-picker wire:model="{{ date('Y-m-d') }}" display-format="YYYY-MM-DD" without-time
                    label="{{ __('Birthday') }}" name="birthday" />

            </div>

        </div>
        {{-- Segunda columna --}}
        <div>
            {{-- Imagen de perfil --}}
            <div class="grid mt-5 sm:mt-0 grid-rows-2 self-center justify-items-center gap-4">
                <div class="self-center mt-4">
                    <img src="{{ asset('assets/img/users/default_user.png') }}" alt=""
                        class="rounded-full w-40 h-40">
                </div>
                <label for="image" class="text-blue-600 w-2/3">
                    <div
                        class="col-span-1 p-3 hover:bg-gray-200 grid grid-rows-2 sm:col-span-2 cursor-pointer bg-gray-100 rounded-xl shadow-md dark:shadow-gray-500 flex items-center justify-center">
                        <div class="flex flex-col items-center justify-center">
                            <x-icon name="cloud-upload" class="w-16 h-16 text-blue-600" />
                        </div>
                        <div class="self-center mt-2">
                            {{ __('Click to upload an image') }}
                        </div>
                        <input type="file" accept="image/*" name="image" class="hidden" id="image">
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                </label>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
        </div>
        {{-- Link y botón --}}
        <div class="mx-auto mt-8 sm:col-span-2 justify-items-center">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
