<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Subcategory;
use App\Item;

// use App\User;

class ListController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = Category::all()->toArray();
        $subcategories = Subcategory::all()->toArray();

        $ctg_id = $request->input('ctg_id');
        $subctg_id = $request->input('subctg_id');
        $search = $request->input('search');

        $query = Item::query();

        if (!empty($ctg_id) && !empty($subctg_id)) {
            $items = $query->whereRaw('ctg_id = ? and subctg_id = ?', array($ctg_id, $subctg_id))
                ->get()
                ->toArray();
        } elseif (!empty($ctg_id)) {
            $items = $query->where('ctg_id', '=', $ctg_id)
                ->get()
                ->toArray();
        } elseif (!empty($subctg_id)) {
            $items = $query->where('subctg_id', '=', $subctg_id)
                ->get()
                ->toArray();
        } elseif (!empty($search)) {
            $items = $query
                ->join('categories', 'items.ctg_id', '=', 'categories.ctg_id')
                ->join('subcategories', 'items.subctg_id', '=', 'subcategories.subctg_id')
                ->where(DB::raw('concat(items.item_name, items.detail, categories.category_name, subcategories.category_name)'), 'like', "%{$search}%")
                ->get()
                ->toArray();
        } else {
            $items = Item::all()->toArray();
        }

        return view('list.index', compact('items', 'categories', 'subcategories'));
    }
}

