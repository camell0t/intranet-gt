<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    //protected $redirectTo = '/perfil';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        return redirect()->route('home.index');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'sobrenome' => 'required|max:255',
            'funcao' => 'required|max:255',
            'empresa' => 'required'
        ],[
            'name.required'=>'Preencha seu nome',
            'name.max'=>'O nome não pode ultrapassar 255 caracteres',
            'email.required'=>'Preencha um e-mail',
            'email.email'=>'Preencha um e-mail válido',
            'email.unique'=>'Esse e-mail já está sendo utilizado',
            'email.max'=>'O e-mail não pode ultrapassar 255 caracteres',
            'password.required'=>'Preencha uma senha',
            'password.min'=>'A senha deve conter mais de 6 caracteres',
            'password.confirmed'=>'As senhas não conferem',
            'sobrenome.required' => 'Preencha seu sobrenome',
            'sobrenome.max' => 'O sobrenome não pode ultrapassar 255 caracteres',
            'funcao.max' => 'A função não pode ultrapassar 255 caracteres',
            'funcao.required' => 'Preencha a função',
            'empresa.required' => 'Selecione uma empresa'
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'sobrenome' => $data['sobrenome'],
            'funcao' => $data['funcao'],
            'empresa' => $data['empresa'],
            'password' => bcrypt($data['password'])
        ]);

        
    }

     protected function criar(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'sobrenome' => $data['sobrenome'],
            'funcao' => $data['funcao'],
            'empresa' => $data['empresa'],
            'password' => bcrypt($data['password'])
        ]);
      
    }
}