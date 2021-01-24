<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Cart;
use App\User;
use App\Order;
use App\Order_detail;

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

    public function complete()
    {
        $user_id = Auth::id();
        $cart_item = Cart::getCart($user_id);

        // ordertableへのデータ挿入
        $order = Order::create([
            'user_id' => $user_id,
        ]);

        //  order_detailへのデータ挿入
        $insert_id = $order->id;

        foreach ($cart_item as $data) {
            Order_detail::create([
                'order_id' => $insert_id,
                'item_id' => $data->item_id,
                'amount' => $data->amount,
            ]);
        }

        Cart::where('user_id', $user_id)
            ->delete();

        return view('order.complete');
    }
}
