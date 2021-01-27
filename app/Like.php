<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    //
    protected $primaryKey = 'like_id';

    protected $fillable = [
        'user_id',
        'item_id'
    ];

    public function item()
    {
        return $this->hasMany('App\Item', 'item_id', 'item_id');
    }

    public static function likeExists($item_id){
        // LIKESテーブルに、user_idに紐づくフィールドがあるかどうかを確認する。
        $user_id = Auth::id();

        $like_data = Like::where('user_id', $user_id)
        ->where('item_id', $item_id)
        ->get();
        
        $like_bool = (!$like_data->isEmpty()) ? $like_data : false;
        
        return $like_bool;
    }
}
