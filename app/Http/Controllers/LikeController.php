<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Like;

class LikeController extends Controller
{
    //
    public function like(Request $request)
    {
        $user_id = Auth::id();
        $item_id = $request->input('item_id');

        $like_data = Like::where('item_id', $item_id)
            ->where('user_id', $user_id)
            ->get();

        if ($like_data->isEmpty()) {
            $newlike_data = Like::create(
                [
                    'user_id' => $user_id,
                    'item_id' => $item_id,
                ]
            );
        } elseif (!$like_data->isEmpty()) {
            $dellike_data = Like::where('item_id', $item_id)
                ->where('user_id', $user_id)
                ->delete();
        }

        $total_like = Like::where('item_id', $item_id)
            ->count();

        echo $total_like;
    }
}
