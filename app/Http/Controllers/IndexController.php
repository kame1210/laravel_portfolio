<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //
    public function index()
    {
        // $user = Auth::user();

        // $user_name = $user->family_name . $user->first_name;
        // $user_id = $user->user_id;

        $items = Item::where('ctg_id', '=', '1')->get();
        $howtoItems = Item::where('ctg_id', '=', '2')->get();
        $eventItems = Item::where('ctg_id', '=', '3')->get();

        $categories = Category::all()->toArray();
        // $imagePath = public_path('uploads\\');

        return view('index', compact('items', 'howtoItems', 'eventItems', 'categories'));
    }
}
