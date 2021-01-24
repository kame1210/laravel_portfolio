<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    //
    protected $primarykey = 'order_id';

    protected $fillable = [
        'user_id',
    ];

    public function order_detail()
    {
        return $this->hasMany('App\Order_detail', 'order_id', 'order_id');
    }

    public static function getItemData()
    {
        $item_data = DB::table('orders')
            ->join('order_details', 'orders.order_id', 'order_details.order_id')
            ->join('items', 'order_details.item_id', 'items.item_id')
            ->select('orders.order_id', 'items.item_name', 'items.price', 'items.image', 'order_details.amount')
            ->get();

        return $item_data;
    }

    public static function getSumPrice()
    {
        $sum_price = DB::table('orders')
        ->join('order_details', 'orders.order_id', 'order_details.order_id')
        ->join('items', 'order_details.item_id', 'items.item_id')
        ->select(DB::raw("sum(items.price * amount) as sum_price, orders.order_id"))
        ->groupBy('orders.order_id')
        ->get();

        return $sum_price;
        }
}
