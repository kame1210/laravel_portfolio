<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Like;
use App\Item;
use App\Order;
use App\InitMaster;
use App\Order_detail;

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

        $item_data = Item::where('user_id', $user_id)
            ->get();


        for ($i = 0; $i < count($item_data); $i++) {
            $item_data[$i]['image'] = explode(',', $item_data[$i]['image']);
        }

        return view('mypage.submitItem', compact('item_data'));
    }

    public function history()
    {
        $user_id = Auth::id();

        // オーダー情報を取得
        $orders = Order::where('user_id', $user_id)
            ->get();

        // オーダーに基くitemを取得
        $item_data = Order::getItemData();

        // order毎の合計金額を取得
        $sum_prices = Order::getSumPrice();

        // いいねを取得
        $like_count = Like::select('item_id', DB::raw('count(user_id) as likes'))
        ->groupby('item_id')
        ->get();

        return view('mypage.history', compact('orders', 'item_data', 'sum_prices', 'like_count'));
    }
}
