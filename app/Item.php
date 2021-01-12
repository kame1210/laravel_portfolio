<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class Item extends Model
{
    //
    use SoftDeletes;

    protected $primaryKey = 'item_id';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'item_name',
        'detail',
        'price',
        'image',
        'ctg_id',
        'subctg_id',
        'user_id',
    ];

    public function carts(){
        return $this->hasMany('App\Cart', 'item_id');
    }



    // public static function getItemDetail($item_id){
    //     return DB::find($item_id)->toArray();
    // }

}
