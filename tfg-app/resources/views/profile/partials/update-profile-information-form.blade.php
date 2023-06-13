<section class="grid sm:grid-cols-2 grid-cols-1">
    <div>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Profile Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form enctype="multipart/form-data" method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div class="grid grid-cols-2 gap-4">
                {{-- Nombre --}}
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name', $user->name)" autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                {{-- Apellidos --}}
                <div>
                    <x-input-label for="surname" :value="__('Surname')" />
                    <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full"
                        :value="old('surname', $user->surname)" autofocus autocomplete="surname" />
                    <x-input-error class="mt-2" :messages="$errors->get('surname')" />

                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                {{-- Fecha nacimiento --}}
                <div>
                    <x-datetime-picker wire:model='{{ $user->birthday }}' display-format="YYYY-MM-DD" without-time
                        label="{{ __('Birthday') }}" name="birthday" />
                </div>
                {{-- DNI --}}
                <div>
                    <x-input-label for="dni" :value="__('DNI')" />
                    <x-text-input id="dni" name="dni" type="text" class="mt-1 block w-full"
                        :value="old('dni', $user->dni)" autofocus autocomplete="dni" />
                    <x-input-error class="mt-2" :messages="$errors->get('dni')" />

                </div>
            </div>
            {{-- Email --}}
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                    autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
            {{-- Botón guardar --}}
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                @endif
            </div>
    </div>
    <div>
        {{-- Imagen de perfil --}}
        <div class="grid grid-rows-2 self-center justify-items-center gap-4">
            <div class="self-center">
                <img src="{{ asset('assets/img/users/') }}{{ $user->image != null ? '/' . $user->image : '/' . $user->default_img }}"
                    alt="" class="rounded-full w-42 h-52">
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
        </div>
        </form>
    </div>
