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
        $cart = new Cart();
        $user = new User();
        $user_id = Auth::id();

        $cartItem = $cart->getCart($user_id);

        if (empty($cartItem)) {
            return redirect('/cart')
                ->with('error', '買い物カゴは空です');
        }

        $sumPrice = DB::table('carts')
            ->join('items', 'carts.item_id', '=', 'items.item_id')
            ->where('carts.user_id', '=', $user_id)
            ->sum(DB::raw('items.price * carts.amount'));

        $userData = $user->find($user_id);

        return view('order.index', compact('userData', 'cartItem', 'sumPrice'));
    }
}
