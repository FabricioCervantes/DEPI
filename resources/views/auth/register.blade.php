<x-app-layout>
    @section('title', 'Registro')

    <x-authentication-card>
        <x-slot name="logo">

        </x-slot>

        {{-- <x-validation-errors class="mb-4" /> --}}
        <h1 class="text-4xl font-bold text-center">Registro de usuarios</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" required type="text" name="name" :value="old('name')"
                    autofocus autocomplete="name" />
                @error('name')
                    <span class="text-red-500 text-sm"></span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="lastName" value="{{ __('Apellidos') }}" />
                <x-input id="lastName" required class="block mt-1 w-full" type="text" name="lastName"
                    :value="old('lastName')" autofocus autocomplete="lastName" />
                @error('lastName')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" required class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" autocomplete="username" />
                @error('email')
                    <span class="text-red-500 text-sm">Recuerda que el correo debe ser institucional</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="tipou" value="{{ __('Tipo de usuario') }}" />
                <select
                    class="border-gray-300 w-full mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    name="tipou" id="tipou" required>
                    <option value="">Seleccione...</option>
                    <option {{ old('tipou') == 'E' ? 'selected' : '' }} value="E">Estudiante</option>
                    <option {{ old('tipou') == 'A' ? 'selected' : '' }} value="A">Academico</option>
                </select>
                @error('tipou')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>


            <div class="flex gap-5 justify-between mt-4">
                <div class="w-full">
                    <x-label for="nacimiento" value="{{ __('Fecha de nacimiento') }}" />
                    <x-input id="nacimiento" required class="block mt-1 w-full" type="date" name="nacimiento"
                        :value="old('nacimiento')" autofocus autocomplete="nacimiento" />
                    @error('nacimiento')
                        <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label for="sexo" value="{{ __('Sexo') }}" />
                    <select
                        class="border-gray-300 w-full mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="sexo" required>
                        <option value="">Seleccione...</option>
                        <option {{ old('sexo') == 'Hombre' ? 'selected' : '' }} value="Hombre">Hombre</option>
                        <option {{ old('sexo') == 'Mujer' ? 'selected' : '' }} value="Mujer">Mujer</option>
                    </select>
                    @error('sexo')
                        <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                    @enderror
                </div>
            </div>

            <!-- Campo adicional para Estudiante -->
            <div id="campoEstudiante" style="display: none;">
                <div class="mt-4 w-full">
                    <x-label for="control" value="{{ __('Número de control') }}" />
                    <x-input id="control" class="block mt-1 w-full" type="number" name="control" :value="old('control')"
                        autocomplete="control" />
                    @error('control')
                        <span class="text-red-500 text-sm">El campo es obligatorio y debe ser un número de control
                            válido.</span>
                    @enderror
                </div>

            </div>

            <!-- Campo adicional para Académico -->
            <div id="campoAcademico" style="display: none;">
                <div class="mt-4 w-full">
                    <x-label for="conacyt" value="{{ __('Expediente de CONACYT') }}" />
                    <x-input id="conacyt" class="block mt-1 w-full" type="number" name="conacyt" :value="old('conacyt')"
                        autocomplete="conacyt" />
                    @error('conacyt')
                        <span class="text-red-500 text-sm">El campo es obligatorio</span>
                    @enderror
                </div>

                <div class="mt-4 w-full">
                    <x-label for="cvu" value="{{ __('CVU de TecNM') }}" />
                    <x-input id="cvu" class="block mt-1 w-full" type="text" name="cvu" :value="old('cvu')"
                        autocomplete="cvu" />
                    @error('cvu')
                        <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                    @enderror
                </div>

            </div>

            <div class="mt-4 w-full">
                <x-label for="telefono" value="{{ __('Teléfono') }}" />
                <x-input id="telefono" required class="block mt-1 w-full" type="number" name="telefono"
                    :value="old('telefono')" autocomplete="telefono" />
                @error('telefono')
                    <span class="text-red-500 text-sm">El campo es obligatorio y debe ser un número de teléfono.</span>
                @enderror
            </div>

            <div class="flex gap-5 justify-between mt-4">
                <div class="w-full">
                    <x-label for="institucion" value="{{ __('Institución') }}" />
                    <select
                        class="border-gray-300 w-full mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="institucion" required>
                        <option value="">Seleccione...</option>
                        @foreach ($instituciones as $item)
                            <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                        @endforeach
                        @error('institucion')
                            <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                        @enderror
                    </select>
                </div>
                <div class="w-full">
                    <x-label for="carrera" value="{{ __('Carrera o Postgrado') }}" />
                    <select
                        class="border-gray-300 w-full mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="carrera" required>
                        <option value="">Seleccione una opción...</option>
                        <option {{ old('carrera') == 'Ingenieria Mecatrónica' ? 'selected' : '' }}
                            value="Ingenieria Mecatrónica">
                            Ingenieria Mecatrónica</option>
                        <option {{ old('carrera') == 'Ingenieria en Sistemas Computacionales' ? 'selected' : '' }}
                            value="Ingenieria en Sistemas Computacionales">Ingenieria en Sistemas Computacionales
                        </option>
                        <option {{ old('carrera') == 'Ingenieria Eléctrica' ? 'selected' : '' }}
                            value="Ingenieria Eléctrica">Ingenieria Eléctrica</option>
                        <option {{ old('carrera') == 'Ingenieria Bioquimica' ? 'selected' : '' }}
                            value="Ingenieria Bioquimica">Ingenieria Bioquimica</option>
                        <option {{ old('carrera') == 'Ingenieria Industrial' ? 'selected' : '' }}
                            value="Ingenieria Industrial">Ingenieria Industrial</option>
                        <option {{ old('carrera') == 'Ingenieria en Materiales' ? 'selected' : '' }}
                            value="Ingenieria en Materiales">Ingenieria en Materiales</option>
                        <option {{ old('carrera') == 'Ingenieria Mecánica' ? 'selected' : '' }}
                            value="Ingenieria Mecánica">Ingenieria Mecánica</option>
                        <option {{ old('carrera') == 'Ingenieria Eléctrónica' ? 'selected' : '' }}
                            value="Ingenieria Eléctrónica">Ingenieria Eléctrónica</option>
                        <option {{ old('carrera') == 'Ingenieria en Gestión Empresarial' ? 'selected' : '' }}
                            value="Ingenieria en Gestión Empresarial">Ingenieria en Gestión Empresarial</option>
                        <option {{ old('carrera') == 'Maestría en Ingenieria Administrativa' ? 'selected' : '' }}
                            value="Maestría en Ingenieria Administrativa">Maestría en Ingenieria Administrativa
                        </option>
                        <option {{ old('carrera') == 'Maestría en Ingenieria Eléctrica' ? 'selected' : '' }}
                            value="Maestría en Ingenieria Eléctrica">Maestría en Ingenieria Eléctrica</option>
                        <option {{ old('carrera') == 'Maestría en Sistemas Computacionales' ? 'selected' : '' }}
                            value="Maestría en Sistemas Computacionales">Maestría en Sistemas Computacionales</option>
                        <option
                            {{ old('carrera') == 'Maestría en Ciencias en Ingenieria Eléctrica' ? 'selected' : '' }}
                            value="Maestría en Ciencias en Ingenieria Eléctrica">Maestría en Ciencias en Ingenieria
                            Eléctrica</option>
                        <option
                            {{ old('carrera') == 'Maestría en Ciencias en Ingenieria Electrónica' ? 'selected' : '' }}
                            value="Maestría en Ciencias en Ingenieria Electrónica">Maestría en Ciencias en Ingenieria
                            Electrónica</option>
                        <option {{ old('carrera') == 'Maestría en Ciencias en Metalurgia' ? 'selected' : '' }}
                            value="Maestría en Ciencias en Metalurgia">Maestría en Ciencias en Metalurgia</option>
                        <option {{ old('carrera') == 'Doctorado en Ciencias de la Ingenieria' ? 'selected' : '' }}
                            value="Doctorado en Ciencias de la Ingenieria">Doctorado en Ciencias de la Ingenieria
                        </option>
                        <option
                            {{ old('carrera') == 'Doctorado en Ciencias en Ingenieria Eléctrica' ? 'selected' : '' }}
                            value="Doctorado en Ciencias en Ingenieria Eléctrica">Doctorado en Ciencias en Ingenieria
                            Eléctrica</option>

                    </select>
                    @error('carrera')
                        <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-label class="text-red-800"
                    value="La contraseña debe llevar mínimo 8 caracteres, un número y un carácter especial" />
                <x-input id="password" required class="block mt-1 w-full" type="password" name="password"
                    autocomplete="new-password" />
                @error('password')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">El campo es obligatorio.</span>
                @enderror
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>

<script>
    const selectTipou = document.getElementById('tipou');
    const campoEstudiante = document.getElementById('campoEstudiante');
    const campoAcademico = document.getElementById('campoAcademico');

    selectTipou.addEventListener('change', function() {
        // Ocultar todos los campos adicionales
        campoEstudiante.style.display = 'none';
        campoAcademico.style.display = 'none';

        // Mostrar el campo adicional correspondiente a la selección
        if (selectTipou.value === 'E') {
            campoEstudiante.style.display = 'block';
        } else if (selectTipou.value === 'A') {
            campoAcademico.style.display = 'block';
        }
    });
</script>
