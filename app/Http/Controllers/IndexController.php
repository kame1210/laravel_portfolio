<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Item;
use App\Category;
use App\Like;
use App\My_function;

class IndexController extends Controller
{
    //
    public function index()
    {
        $user_id = Auth::id();

        $items = Item::where('ctg_id', '=', '1')
            ->get();

        for ($i = 0; $i < count($items); $i++) {
            $items[$i]['image'] = explode(',', $items[$i]['image']);
        }

        $howtoItems = Item::where('ctg_id', '=', '2')
            ->get();

        for ($i = 0; $i < count($howtoItems); $i++) {
            $howtoItems[$i]['image'] = explode(',', $howtoItems[$i]['image']);
        }

        $eventItems = Item::where('ctg_id', '=', '3')
            ->get();

        for ($i = 0; $i < count($eventItems); $i++) {
            $eventItems[$i]['image'] = explode(',', $eventItems[$i]['image']);
        }

        $like_count = Like::select('item_id', DB::raw('count(user_id) as likes'))
            ->groupby('item_id')
            ->get();

        $categories = Category::all()->toArray();

        return view('index', compact('items', 'howtoItems', 'eventItems', 'categories', 'like_count'));
    }
}
