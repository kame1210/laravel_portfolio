<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    //
    // use SoftDeletes;

    protected $primaryKey = 'crt_id';

    protected $fillable = [
        'user_id',
        'item_id',
    ];

    public function item()
    {
        return $this->hasMany('App\Item', 'item_id', 'item_id');
    }

    public static function getCart($user_id)
    {
        $cart_item = DB::table('carts')
            ->join('items', 'carts.item_id', '=', 'items.item_id')
            ->select('carts.*', 'items.*')
            ->where('carts.user_id', '=', $user_id)
            ->get()
            ->toArray();

        return $cart_item;
    }

    public static function getSumPrice($user_id)
    {
        $sum_price = DB::table('carts')
        ->join('items', 'carts.item_id', '=', 'items.item_id')
        ->where('carts.user_id', '=', $user_id)
        ->sum(DB::raw('items.price * carts.amount'));

        return $sum_price;
    }

    public static function getSumAmount($user_id)
    {
        $sum_amount = DB::table('carts')
        ->join('items', 'carts.item_id', '=', 'items.item_id')
        ->where('carts.user_id', '=', $user_id)
        ->sum('carts.amount');

        return $sum_amount;
    }
}
