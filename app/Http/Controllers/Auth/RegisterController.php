<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use App\Equipo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
      /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
      */

      use RegistersUsers;

      /**
      * Where to redirect users after registration.
      *
      * @var string
      */
      protected $redirectTo = '/';

      /**
      * Create a new controller instance.
      *
      * @return void
      */
      public function __construct()
      {
            $this->middleware('guest');
      }

      /**
      * Get a validator for an incoming registration request.
      *
      * @param  array  $data
      * @return \Illuminate\Contracts\Validation\Validator
      */
      protected function validator(array $data)
      {
            return Validator::make($data, [
                  'nombre' => 'required|max:255',
                  'apellidos' => 'required|max:255',
                  'fNac' => 'required|date',
                  'dni' => 'required|min:9|max:9|unique:usuario',
                  'password' => 'required|min:6|confirmed',
            ]);
      }

      /**
      * Create a new user instance after a valid registration.
      *
      * @param  array  $data
      * @return User
      */
      protected function create(array $data)
      {
            $equipo = Equipo::where('nombreEquipo','=','Libre')->first();
            if($equipo != null){
                  $equipo = $equipo->id;
            }
            return Usuario::create([
                  'dni' => $data['dni'],
                  'nombre' => $data['nombre'],
                  'apellidos' => $data['apellidos'],
                  'fNac' => strtotime($data['fNac']),
                  'salario' => 0,
                  'rol' => 0,
                  'equipo_id' => $equipo,
                  'password' => bcrypt($data['password']),
            ]);
      }
}
