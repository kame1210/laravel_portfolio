<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Cart;
use App\User;

class OrderController extends Controller
{
    //
    public function index()
    {
        $user_id = Auth::id();

        $cart_item = Cart::getCart($user_id);

        if (empty($cart_item)) {
            return redirect('/cart')
                ->with('error', '買い物カゴは空です');
        }

        $sum_price = Cart::getSumPrice($user_id);

        $sum_amount = Cart::getSumAmount($user_id);

        $user_data = User::find($user_id);

        return view('order.index', compact('user_data', 'cart_item', 'sum_price', 'sum_amount'));
    }
}
