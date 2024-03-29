<div>
    <div class="grid sm:grid-cols-2 gap-8">
        {{-- Lista de hospitales --}}
        @forelse ($hospitals as $key=> $hospital)
            <x-card title="{{ $hospital->name }} ({{ $hospital->foundation_year }})" shadow="shadow-md"
                cardClasses="dark:shadow-gray-700">
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <h3 class="font-bold">{{ __('Address') }}:</h3>
                        <p class="">{{ $hospital->address }},<br> {{ $hospital->province }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold">{{ __('Emergency phone') }}:</h3>
                        <a href="tel:{{ $hospital->phone }}">{{ $hospital->phone }}</a>
                    </div>
                </div>
                {{-- Acordeón de doctores --}}
                <div class="mt-4" id="aacordion-{{ $key }}">
                    <div
                        class="rounded-t-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                        <h2 class="mb-0" id="headingOne-{{ $key }}">
                            <button
                                class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                                type="button" data-te-collapse-init data-te-target="#collapse-{{ $key }}"
                                data-te-collapse-collapsed aria-expanded="false" aria-controls="collapse">
                                {{ __('Doctors') }}
                                <span
                                    class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        {{-- Lista de doctores --}}
                        <div id="collapse-{{ $key }}" class="!visible hidden" data-te-collapse-item
                            data-te-collapse-collapsed aria-labelledby="headingOne"
                            data-te-parent="#accordion-{{ $key }}">
                            <div class="px-5 py-4 grid grid-cols-2 justify-items-center">
                                @foreach ($hospital->doctors as $doctor)
                                    <h3 class="text-xl">{{ $doctor->name }}</h3>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </x-card>
        @empty
            {{ __('There are no Hospitals.') }}
        @endforelse
    </div>
</div>
