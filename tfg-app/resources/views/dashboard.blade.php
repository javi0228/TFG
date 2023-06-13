<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($title) ? $title : __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @isset($livewire_component)
                        @livewire($livewire_component)
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 sm:h-[34rem] p-8">
                            {{-- Link a citas --}}
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 ">
                                <a title="Mis citas"
                                    class=" justify-self-center  hover:scale-110 transition-transform duration-600 ease-in-out sm:justify-self-start h-max"
                                    href="{{ route('appointments') }}">
                                    <img class="rounded-full " src="{{ asset('assets/img/index/appointment.png') }}"
                                        alt="citas">
                                </a>
                                <p class="col-span-3">
                                    Puede solicitar cita en atención primaria, así como realizar determinadas gestiones
                                    sobre citas para asistencia hospitalaria y pruebas diagnósticas.<br><br>
                                    - Crear una nueva cita<br>
                                    - Ver todas mis citas<br>
                                    - Modificar mis citas<br>
                                    - Eliminar mis citas
                                </p>
                            </div>
                            {{-- Link a historial medico --}}
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 ">
                                <a title="Historial médico"
                                    class=" justify-self-center hover:scale-110 transition-transform duration-600 ease-in-out sm:justify-self-start h-max"
                                    href="{{ route('medicalHistory') }}">
                                    <img class="rounded-full" src="{{ asset('assets/img/index/medical_history.png') }}"
                                        alt="historial medico">
                                </a>
                                <p class="col-span-3">
                                    Permite consultar los datos de salud más relevantes, cómo tus alérgias, enfermedades o teléfono de emergéncias registrados en su historia clínica
                                    electrónica e introducir información para el seguimiento de su salud.
                                </p>
                            </div>
                            {{-- Link a Hospitales --}}
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 ">
                                <a title="Hospitales"
                                    class=" justify-self-center hover:scale-110 transition-transform duration-600 ease-in-out sm:justify-self-start h-max"
                                    href="{{ route('hospitals') }}">
                                    <img class="rounded-full" src="{{ asset('assets/img/index/hospitals.jpg') }}"
                                        alt="hospitales">
                                </a>
                                <p class="col-span-3">
                                    También proporcionamos información de los 28 hospitales repartidos por toda Andalucía. Su seguridad es lo
                                    más importante.

                                </p>
                            </div>
                            {{-- Link a mi médico --}}
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 ">
                                <a title="Mi médico"
                                    class=" justify-self-center hover:scale-110 transition-transform duration-600 ease-in-out sm:justify-self-start h-max"
                                    href="{{ route('doctor') }}">
                                    <img class="rounded-full" src="{{ asset('assets/img/index/doctor.jpg') }}"
                                        alt="doctor">
                                </a>
                                <p class="col-span-3">
                                    Es muy importante la relación con su médico de cabecera. Aquí puede ver los datos del
                                    médico que le atenderá en cualquier momento por una urgencia.
                                </p>
                            </div>
                        </div>
                        <!-- Footer container -->

                        <footer class="bg-gray-300 rounded-lg shadow m-4 dark:bg-gray-700">
                            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                                <span class="text-sm text-gray-600 sm:text-center dark:text-gray-400">© 2023 <a
                                        href="https://www.sspa.juntadeandalucia.es/servicioandaluzdesalud/clicsalud/"
                                        target="_blank" class="hover:underline">Página de Sanidad junta de andalucía</a>.
                                </span>
                                <ul
                                    class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-600 dark:text-gray-400 sm:mt-0">
                                    <li>
                                        <a href="#" class="mr-4 hover:underline md:mr-6 ">Realizado por Sergio
                                            Dasí</a>
                                    </li>
                                    <li>
                                        <a href="tel:+34689543123" class="mr-4 hover:underline md:mr-6 ">Contacto: 689543123</a>
                                    </li>

                                </ul>
                            </div>
                        </footer>
                    @endisset

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
