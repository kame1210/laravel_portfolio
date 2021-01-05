<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Like;
use App\InitMaster;

class MypageController extends Controller
{
    //
    public function index()
    {
        return view('mypage.index');
    }

    public function userInfo()
    {
        $user_id = Auth::id();
        $sex = InitMaster::getSex();

        $userData = User::find($user_id);

        // var_dump($userData);

        return view('mypage.userInfo', compact('userData', 'sex'));
    }

    public function likeItem()
    {
        $user_id = Auth::id();
        $likeData = Like::where('user_id')
            ->get();

        dd($likeData);

        return view('mypage.likeItem', compact('likeData'));
    }
}
