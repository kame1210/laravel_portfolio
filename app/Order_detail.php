<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    //
    protected $primarykey = 'order_detail_id';

    protected $fillable = [
        'order_id',
        'item_id',
        'amount',
    ];

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'order_id');
    }

    public function item()
    {
        return $this->hasOne('App\Item', 'item_id', 'item_id');
    }
}
