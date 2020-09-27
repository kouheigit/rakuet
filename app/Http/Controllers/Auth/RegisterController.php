<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    $dammy = [ 'age'=>null, ];
	$moji1 = $data['email'];
        $moji1 = str_replace('@','',$moji1);
        $moji2 = str_replace('.','',$moji1);
        $create = "create table $moji2(id int auto_increment,index(id), age integer(2),sexual varchar(1),height varchar(4),day varchar(20),weight integer(3),beforeweight integer(3), jiki varchar(1),endday varchar(20),target integer(3),plan integer(2))";
        $make =$create;
	$createtable = DB::statement($make);
	DB::table($moji2)->insert($dammy);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
	    'password' => Hash::make($data['password']),
    ]); 
    }
}
