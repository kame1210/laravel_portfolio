<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserRequest;
use App\User;
use App\InitMaster;

class UserController extends Controller
{
    //
    public function create()
    {
        $sexArr = InitMaster::getSex();
        list($yearArr, $monthArr, $dayArr) = InitMaster::getDate();

        return view('user.create', [
            'sexArr' => $sexArr,
            'yearArr' => $yearArr,
            'monthArr' => $monthArr,
            'dayArr' => $dayArr,
        ]);
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'family_name' => $request->get('family_name'),
            'first_name' => $request->get('first_name'),
            'family_name_kana' => $request->get('family_name_kana'),
            'first_name_kana' => $request->get('first_name_kana'),
            'sex' => $request->get('sex'),
            'year' => $request->get('year'),
            'month' => $request->get('month'),
            'day' => $request->get('day'),
            'zip' => $request->get('zip'),
            'address1' => $request->get('address1'),
            'address2' => $request->get('address2'),
            'email' => $request->get('email'),
            'tel' => $request->get('tel'),
            'password' => Hash::make($request->get('password'))
        ]);

        return  view('user.complete');


        // [
        //     'password' => ['required', 'digits_between:8,14'],
        //     'family_name' => ['required'],
        //     'first_name' => ['required'],
        //     'family_name_kana' => '[]',
        //     'first_name_kana' => '[]',
        //     'sex' => ['required'],
        //     'year' => ['required', 'date'],
        //     'month' => ['required', 'date'],
        //     'day' => ['required', 'date'],
        //     'zip' => ['required', 'digits:7'],
        //     'address1' => ['required', 'regex:/^(.+[都道府県])(.+[市町村区]).+[0-9]+$/'],
        //     'address2' => [],
        //     'email' => ['required', 'email:rfc'],
        //     'tel' => ['required', 'digits_between:10,11']
        // ];
        // $validatedData = $request->validate([
        //     'password' => ['required', 'digits_between:8,14'],
        //     'family_name' => ['required'],
        //     'first_name' => ['required'],
        //     'family_name_kana' => '[]',
        //     'first_name_kana' => '[]',
        //     'sex' => ['required'],
        //     'year' => ['required', 'date'],
        //     'month' => ['required', 'date'],
        //     'day' => ['required', 'date'],
        //     'zip' => ['required', 'digits:7'],
        //     'address1' => ['required', 'regex:/^(.+[都道府県])(.+[市町村区]).+[0-9]+$/'],
        //     'address2' => [],
        //     'email' => ['required', 'email:rfc'],
        //     'tel' => ['required', 'digits_between:10,11']
        // ]);
    }
}
