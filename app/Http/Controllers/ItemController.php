<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    //
    public function indexDetail($item_id) {
        $itemDetail = Item::find($item_id)->toArray();

        return view('item.detail', compact('itemDetail'));
    }

    public function edit($id){
        $item = Item::find($id);

        return view('item.edit', compact('item'));
    }
}
