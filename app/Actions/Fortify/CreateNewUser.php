<?php

namespace App\Actions\Fortify;

use App\Models\Academicos;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            // 'email' => 'required|email|max:255|regex:/^.*@morelia\.tecnm\.mx$/i|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'tipou' => ['required', 'string',],
            'nacimiento' => ['required', 'date',],
            'sexo' => ['required', 'string',],
            'telefono' => ['required', 'string',],
            'institucion' => ['required', 'string',],
            'carrera' => ['string',],
            'password' =>  ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();




        if ($input['tipou'] === 'E') {
            Validator::make($input, ['control' => ['string']])->validate();

            $user = User::create([
                'nombre' => $input['name'],
                'apellidos' => $input['lastName'],
                'tipou' => $input['tipou'],
                'sexo' => $input['sexo'],
                'fechaNac' => $input['nacimiento'],
                'ncontrol' => $input['control'],
                'telefono' => $input['telefono'],
                'idIns' => '1',
                'area' => $input['carrera'],
                'estado' => 'Activo',
                'ncontrol' => $input['control'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
            ]);
            $user->assignRole('Estudiante');
        }

        if ($input['tipou'] === 'A') {
            Validator::make($input, ['expediente' => ['string'], 'cvu' => ['string']])->validate();
            $user = User::create([
                'nombre' => $input['name'],
                'apellidos' => $input['lastName'],
                'tipou' => $input['tipou'],
                'sexo' => $input['sexo'],
                'fechaNac' => $input['nacimiento'],
                'telefono' => $input['telefono'],
                'idIns' => '1',
                'area' => $input['carrera'],
                'estado' => 'Activo',
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
            ]);
            $acad = Academicos::create([
                'expediente' => $input['conacyt'],
                'cvu' => $input['cvu'],
            ]);
            $user->assignRole('Academico');
        }

        if ($input['tipou'] === 'L') {
            $user->assignRole('Admin');
        }

        return $user;
    }
}
