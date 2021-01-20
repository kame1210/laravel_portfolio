<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Cart;
use App\InitMaster;

class CartController extends Controller
{
    //
    public function index()
    {
        $cart = new Cart();
        $user_id = Auth::id();

        if ($user_id === null) {
            return redirect('/login');
        }

        $cart_item = Cart::getCart($user_id);

        $sum_price = Cart::getSumPrice($user_id);

        $sum_amount = Cart::getSumAmount($user_id);

        $amounts = InitMaster::getAmount();

        return view('cart.index', compact('cart_item', 'sum_price', 'sum_amount', 'amounts'));
    }

    public function cartIn($item_id)
    {
        $user_id = Auth::id();
        $cart = new Cart();

        if ($user_id === null) {
            return redirect('/login');
        }

        $cartItem = $cart->where('item_id', $item_id)
            ->where('user_id', $user_id)
            ->get();

        if (!$cartItem->isEmpty()) {
            $cart->where('item_id', $item_id)
                ->where('user_id', $user_id)
                ->increment('amount');
        } else {
            $cartInsData = $cart->create([
                'user_id' => $user_id,
                'item_id' => $item_id,
            ]);
        }

        return redirect('/cart');
    }

    public function cartDelete($crt_id)
    {
        $user_id = Auth::id();

        if ($user_id === null) {
            return redirect('/login');
        }

        Cart::where('crt_id', $crt_id)
            ->delete();

        return redirect('/cart');
    }

    public function amountUpdate(Request $request)
    {
        $user_id = Auth::id();
        $cart = new Cart();

        if ($user_id === null) {
            return redirect('/login');
        }

        $cart->where('crt_id', $request->crt_id)
            ->update(['amount' => $request->amount]);

        return redirect('/cart');
    }
}
