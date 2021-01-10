<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Item;
use App\Category;
use App\Like;

class IndexController extends Controller
{
    //
    public function index()
    {
        $items = Item::where('ctg_id', '=', '1')
            ->get();
        $howtoItems = Item::where('ctg_id', '=', '2')
            ->get();
        $eventItems = Item::where('ctg_id', '=', '3')
            ->get();

        $like_count = Like::select('item_id', DB::raw('count(user_id) as likes'))
            ->groupby('item_id')
            ->get();

        $categories = Category::all()->toArray();

        return view('index', compact('items', 'howtoItems', 'eventItems', 'categories', 'like_count'));
    }
}
