<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\InitMaster;

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
            'family_name' => ['required'],
            'first_name' => ['required'],
            'sex' => ['required'],
            'year' => ['required'],
            'month' => ['required'],
            'day' => ['required'],
            'zip' => ['required', 'digits:7'],
            'address1' => ['required', 'regex:/^(.+[都道府県])(.+[市町村区]).+[0-9]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel' => ['required', 'digits_between:10,11'],
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
        return User::create([
            'family_name' => $data['family_name'],
            'first_name' => $data['first_name'],
            'family_name_kana' => $data['family_name_kana'],
            'nafirst_name_kaname' => $data['first_name_kana'],
            'sex' => $data['sex'],
            'year' => $data['year'],
            'month' => $data['month'],
            'day' => $data['day'],
            'zip' => $data['zip'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
