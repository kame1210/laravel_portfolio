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

    public function item(){
        return $this->belongsTo('\App\Item', 'item_id', 'item_id');
    }

    public function getCart($user_id){
        $cartItem = DB::table('carts')
        ->join('items', 'carts.item_id' , '=', 'items.item_id' )
        ->select('carts.*', 'items.*')
        ->where('carts.user_id', '=', $user_id) 
        ->get()
        ->toArray();

        return $cartItem;
    }
}
