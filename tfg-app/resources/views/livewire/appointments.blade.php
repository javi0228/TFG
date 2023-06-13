<div>
    {{-- Notificaciones --}}
    <x-notifications />
    {{-- Botón de creación --}}
    <x-primary-button wire:click="openModal">{{ __('Create appointment') }}</x-primary-button>
    @forelse ($appointments as $key=> $appointment)
        {{-- Listado de citas --}}
        <div class="mt-4" id="aacordion-{{ $key }}">
            <div class="rounded-t-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                <h2 class="mb-0" id="headingOne-{{ $key }}">
                    <button
                        class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white
                         px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none]
                          hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white
                           [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary
                            [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)]
                             dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400
                              dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                        type="button" data-te-collapse-init data-te-target="#collapse-{{ $key }}"
                        data-te-collapse-collapsed aria-expanded="false" aria-controls="collapse">
                        <p>
                            {{ $appointment->cause }}&nbsp;({{ $appointment->date ? $appointment->date : 'Fecha no definida' }})
                        </p>

                        <span
                            class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>
                </h2>
                {{-- Datos de la cita --}}
                <div id="collapse-{{ $key }}" class="!visible hidden" data-te-collapse-item
                    data-te-collapse-collapsed aria-labelledby="headingOne"
                    data-te-parent="#accordion-{{ $key }}">
                    <div class="px-5 py-4 grid sm:grid-cols-4 grid-cols-1 justify-items-center gap-4">
                        {{-- Botón modificar fecha --}}
                        <x-secondary-button class="col-span-4 justify-self-start" data-te-toggle="modal"
                            data-te-target="#dateModal-{{ $key }}" data-te-ripple-init
                            data-te-ripple-color="light">
                            {{ __('Edit date') }}
                        </x-secondary-button>
                        {{-- Médico --}}
                        <div class="grid grid-cols-1 sm:grid-flow-col gap-2 content-start">
                            <p class="font-bold leading-normal">{{ __('Doctor') }}:</p>
                            <p class="text-sm leading-loose">{{ $appointment->user->doctor->name .' '. $appointment->user->doctor->surname}}</p>
                        </div>
                        {{-- Hospital --}}
                        <div class="grid grid-cols-1 sm:grid-flow-col gap-2 content-start">
                            <p class="font-bold leading-normal">{{ __('Hospital') }}:</p>
                            <p class="text-sm leading-loose">{{ $appointment->user->doctor->hospital->name }}</p>
                        </div>
                        {{-- Dirección Hospital --}}
                        <div class="grid grid-cols-1 sm:grid-flow-col gap-2 content-start">
                            <p class="font-bold leading-normal">{{ __('Address') }}:</p>
                            <p class="text-sm leading-loose">{{ $appointment->user->doctor->hospital->address }}</p>
                        </div>
                        {{-- Consulta --}}
                        <div class="grid grid-cols-1 sm:grid-flow-col gap-2 content-start">
                            <p class="font-bold leading-normal">{{ __('Office') }}:</p>
                            <p class="text-sm leading-loose">{{ $appointment->office }}</p>
                        </div>
                        {{-- Diagnóstico --}}
                        <div class="grid sm:grid-cols-2 grid-cols-1 gap-2 col-span-4 content-start">
                            <p class="font-bold leading-normal justify-self-center sm:justify-self-end">
                                {{ __('Diagnosis') }}:</p>
                            <p class="text-sm leading-loose">{{ $appointment->diagnosis }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal para modificar fecha --}}
        <div wire:ignore data-te-modal-init
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="dateModal-{{ $key }}" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div data-te-modal-dialog-ref
                class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div
                    class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                    <div
                        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Titulo Modal-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                            id="exampleModalLabel">
                            {{ __('Edit date') }}&nbsp;({{ $appointment->cause }})
                        </h5>
                        <!--Botón cerrar-->
                        <button type="button"
                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!--Cuerpo Modal-->
                    <div data-te-modal-body-ref class="relative p-4">
                        <x-datetime-picker wire:model='newDate' display-format="YYYY-MM-DD" without-time
                            label="{{ __('Date') }}" />
                    </div>

                    <!--Footer Modal-->
                    <div
                        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <button id="close-modal" type="button"
                            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                            data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            {{ __('Close') }}
                        </button>
                        <button wire:click="saveDate({{ $appointment->id }})" type="button"
                            class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                            data-te-ripple-init data-te-ripple-color="light">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-md text-center text-gray-600 dark:text-gray-400">{{ __('You have no appointments.') }}</p>
    @endforelse
    {{-- Modal para la creacion de la cita --}}
    <x-modal.card title="{{ __('Create appointment') }}" blur wire:model.defer="modalFlag">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            {{-- Input para la causa --}}
            <x-input label="{{ __('Cause') }}" id="{{ __('Cause') }}" wire:model="newAppointment.cause" />

            {{-- Input para la consulta --}}
            <x-input label="{{ __('Office') }}" id="{{ __('Office') }}" wire:model="newAppointment.office" />

            {{-- Datepicker para la fecha --}}
            <div class="col-span-1 sm:col-span-2">
                <x-datetime-picker wire:model='newAppointment.date' display-format="YYYY-MM-DD" without-time
                    label="{{ __('Date') }}" />
            </div>

            {{-- Text area para el diagnostico --}}
            <div class="col-span-1 sm:col-span-2">
                <x-textarea label="{{ __('Diagnosis') }}" wire:model="newAppointment.diagnosis" />
            </div>

        </div>

        <x-slot name="footer">
            <div class="flex gap-x-4">
                <div class="flex">
                    <x-button primary label="{{ __('Save') }}" wire:click="saveAppointment" />
                    <x-button flat label="{{ __('Cancel') }}" x-on:click="close" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
@push('js')
    <script>
        // Cerrar modal
        window.addEventListener('dateUpdated', () => {
           document.getElementById('close-modal').click();
        })
    </script>
@endpush
