<div>
    @if ($doctor)
    <div class="grid  gap-4">
        <div class="justify-self-center col-span-2 sm:col-span-1">
            {{-- foto del doctor --}}
            <img src="{{ asset('assets/img/doctors') }}{{$doctor->image != null ? '/' . $doctor->image : '/default_doctor.png' }}"
                alt="" class="rounded-full w-32 sm:w-52 h-42 sm:h-62">
        </div>
        <div class="self-center grid gap-2 col-span-2 sm:col-span-1 ">
            <div class="grid grid-cols-2 gap-4">
                {{-- Nombre --}}
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" disabled type="text" class="mt-1 block w-full" :value="old('name', $doctor->name)"
                        autofocus />
                </div>
                {{-- Apellidos --}}
                <div>
                    <x-input-label for="surname" :value="__('Surname')" />
                    <x-text-input id="surname" disabled type="text" class="mt-1 block w-full" :value="old('surname', $doctor->surname)"
                        autofocus />
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                {{-- Teléfono --}}
                <div>
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" disabled type="text" class="mt-1 block w-full" :value="old('phone', $doctor->phone)"
                        autofocus />
                </div>
                {{-- Años de experiencia --}}
                <div>
                    <x-input-label for="years_of_experience" :value="__('Years of experience')" />
                    <x-text-input id="years_of_experience" disabled type="text" class="mt-1 block w-full" :value="old('years_of_experience', $doctor->years_of_experience)"
                        autofocus />
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                {{-- Fecha nacimiento --}}
                <div>
                    <x-input-label for="birthday" :value="__('Birthday')" />
                    <x-text-input id="birthday" disabled type="text" class="mt-1 block w-full"
                        :value="old('birthday', $doctor->birthday)" />
                </div>
                {{-- DNI --}}
                <div>
                    <x-input-label for="specialism" :value="__('Specialism')" />
                    <x-text-input id="specialism" disabled type="text" class="mt-1 block w-full" :value="old('specialism', $doctor->specialism)"
                        autofocus />
                </div>
            </div>
        </div>
    </div>
    @else
        <p>{{ __('You don\'t have a doctor') }}</p>
    @endif
</div>
