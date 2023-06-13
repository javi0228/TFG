<div>
    {{-- Lugar dónde se mostrarán las notificaciones --}}
    <x-notifications />
    @if ($medicalHistory)
        {{-- Datos del historial médico --}}
        <div class="grid  gap-4">
            <div class="justify-self-center col-span-2 sm:col-span-1">
                {{-- foto del uusario --}}
                <img src="{{ asset('assets/img/users/') }}{{ Auth::user()->image != null ? '/' . Auth::user()->image : '/' . Auth::user()->default_img }}"
                    alt="" class="rounded-full w-32 sm:w-52 h-42 sm:h-62">
            </div>
            <div class="self-center grid gap-2 col-span-2 sm:col-span-1 ">
                <div class="grid grid-cols-2 gap-4">
                    {{-- Nombre --}}
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" disabled type="text" class="mt-1 block w-full" :value="old('name', Auth::user()->name)"
                            autofocus />
                    </div>
                    {{-- Apellidos --}}
                    <div>
                        <x-input-label for="surname" :value="__('Surname')" />
                        <x-text-input id="surname" disabled type="text" class="mt-1 block w-full" :value="old('surname', Auth::user()->surname)"
                            autofocus />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    {{-- Fecha nacimiento --}}
                    <div>
                        <x-input-label for="birthday" :value="__('Birthday')" />
                        <x-text-input id="birthday" disabled type="text" class="mt-1 block w-full"
                            :value="old('birthday', Auth::user()->birthday)" />
                    </div>
                    {{-- DNI --}}
                    <div>
                        <x-input-label for="dni" :value="__('DNI')" />
                        <x-text-input id="dni" disabled type="text" class="mt-1 block w-full" :value="old('dni', Auth::user()->dni)"
                            autofocus />
                    </div>
                </div>
                {{-- Email --}}
                <div class="grid grid-cols-2 gap-4">
                    {{-- Teléfono de emergencia --}}
                    <div>
                        <x-input-label for="phone" :value="__('Emergency phone')" />
                        <x-text-input id="phone" disabled type="text" class="mt-1 block w-full"
                            :value="old('phone', $medicalHistory->emergency_phone)" />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" disabled type="email" class="mt-1 block w-full" :value="old('email', Auth::user()->email)" />
                    </div>
                </div>
            </div>
            <div class="justify-self-center grid grid-cols-2 w-full gap-4 col-span-2 mt-7">

                {{-- Otras enfermedades --}}
                <div>
                    <div>
                        <x-input-label for="other_diseases" :value="__('Other diseases')" />
                        <x-textarea id="other_diseases" disabled type="text" class="mt-1 block w-full">
                            {{ $medicalHistory->other_diseases }}</x-textarea>
                    </div>
                </div>
                {{-- Alérgias --}}
                <div>
                    <x-input-label for="allergies" :value="__('allergies')" />
                    <x-textarea id="allergies" disabled type="text" class="mt-1 block w-full"
                        :value="old('allergies', $medicalHistory->allergies)">{{ $medicalHistory->allergies }}</x-textarea>
                </div>

                {{-- Checkboxes --}}
                <div
                    class="col-span-2 sm:col-span-3 grid sm:grid-cols-4 grid-cols-2 sm:gap-0 gap-4 justify-items-center">
                    {{-- Diabetes --}}
                    @if ($medicalHistory->diabetes)
                        <x-checkbox disabled checked id="{{ __('diabetes') }}" left-label="{{ __('diabetes') }}" />
                    @else
                        <x-checkbox disabled id="{{ __('diabetes') }}" left-label="{{ __('diabetes') }}" />
                    @endif
                    {{-- Cancer --}}
                    @if ($medicalHistory->cancer)
                        <x-checkbox disabled checked id="{{ __('cancer') }}" left-label="{{ __('cancer') }}" />
                    @else
                        <x-checkbox disabled id="{{ __('cancer') }}" left-label="{{ __('cancer') }}" />
                    @endif
                    {{-- Sobrepeso --}}
                    @if ($medicalHistory->overweight)
                        <x-checkbox disabled checked id="{{ __('overweight') }}"
                            left-label="{{ __('overweight') }}" />
                    @else
                        <x-checkbox disabled id="{{ __('overweight') }}" left-label="{{ __('overweight') }}" />
                    @endif
                    {{-- Epilepsia --}}
                    @if ($medicalHistory->epilepsy)
                        <x-checkbox disabled checked id="{{ __('epilepsy') }}" left-label="{{ __('epilepsy') }}" />
                    @else
                        <x-checkbox disabled id="{{ __('epilepsy') }}" left-label="{{ __('epilepsy') }}" />
                    @endif
                </div>
            </div>
        </div>
    @else
        <div>
            <p>{{ __('There is no medical history.') }}</p>
            <button wire:click="toogleModal"
                class="rounded-md dark:bg-cyan-200 bg-cyan-400 text-gray-800 dark:text-gray-700 shadow-md dark:shadow-gray-600 hover:bg-cyan-200 p-2 mt-3 dark:hover:bg-cyan-400 dark:hover:text-gray-800 transition-colors duration-500 ease-in-out">{{ __('Create Medical History') }}</button>
        </div>
    @endif

    {{-- Modal para la creación del historial médico --}}
    <x-modal.card title="{{ __('Create Medical History') }}" blur wire:model.defer="cardModal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            {{-- Input para las alergias --}}
            <x-input label="{{ __('allergies') }}" id="{{ __('allergies') }}"
                placeholder="{{ 'Ej. ' . __('Lactose intolerant') }}" wire:model="newMedicalHistory.allergies" />
            {{-- Input de teléfono con máscara ###-###-### --}}
            <x-inputs.maskable mask="###-###-###" label="{{ __('Emergency phone') }}" id="__('Emergency phone')"
                placeholder="111-222-333" wire:model.defer="newMedicalHistory.emergency_phone" />
            <x-checkbox id="{{ __('diabetes') }}" left-label="{{ __('diabetes') }}"
                wire:model="newMedicalHistory.diabetes" />
            <x-checkbox id="{{ __('cancer') }}" label="{{ __('cancer') }}" wire:model="newMedicalHistory.cancer" />
            <x-checkbox id="{{ __('overweight') }}" left-label="{{ __('overweight') }}"
                wire:model="newMedicalHistory.overweight" />
            <x-checkbox id="{{ __('epilepsy') }}" label="{{ __('epilepsy') }}"
                wire:model="newMedicalHistory.epilepsy" />

            {{-- Text area para otras enfermedades --}}
            <div class="col-span-1 sm:col-span-2">
                <x-textarea label="{{ __('Other diseases') }}" placeholder="{{ 'Ej. ' . __('Chronic bronchitis') }}"
                    wire:model="newMedicalHistory.other_diseases" />
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex gap-x-4">
                <div class="flex">
                    <x-button primary label="{{__('Save')}}" wire:click="save" />
                    <x-button flat label="{{__('Cancel')}}" x-on:click="close" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
