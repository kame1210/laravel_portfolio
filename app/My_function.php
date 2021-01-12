<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Like;

class My_function extends Model
{
    //
    public static function like_exists($user_id, $item_id){
        $res = Like::where('user_id', $user_id)
        ->where('item_id', $item_id)
        ->get();

        $res = (!$res->isEmpty()) ? true : false;

        return $res;
    }
}
