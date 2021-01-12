<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Like;
use App\Item;
use App\Order;
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
        $like_data = Like::where('user_id', $user_id)->get();

        foreach ($like_data as $like) {
            $like_item[] = $like->item;
        }

        return view('mypage.likeItem', compact('like_item'));
    }

    public function submitItem()
    {
        $user_id = Auth::id();

        $itemData = Item::where('user_id', $user_id)
            ->get();

        return view('mypage.submitItemd
        ', compact('itemData'));
    }

    public function orderHistory()
    {
        $user_id = Auth::id();

        // user_id = $user_id
        // hasMany order_id = order_detail order_id;

    }
}
