<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Subcategory;
use Illuminate\Support\Facades\Auth;

class ItemSubmitController extends Controller
{
    //
    public function index(Request $request)
    {
        $user_id = Auth::id();

        if ($user_id == NULL) {
            return redirect('/login');
        }

        $category = Category::all()->toArray();
        $subcategory = Subcategory::all()->toArray();

        return view('item.submit', [
            'categories' => $category,
            'subcategories' => $subcategory,
        ]);
    }

    public function store(Request $request)
    {    
        $user_id = Auth::id();

        $validatedData = $request->validate([
            'item_name' => ['required'],
            'price' => ['required', 'alpha_num'],
            'detail' => ['required'],
            'category' => ['required'],
            'subcategory' => ['required'],
            'image' => ['image', 'mimes:png,jpeg', 'file', 'max:1000'],
        ]);


        if ($file = $request->file('image')) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = storage_path('app\public\uploads');
            $file->move($targetPath, $fileName);

            $item = Item::create([
                'item_name' => $request->get('item_name'),
                'price' => $request->get('price'),
                'detail' => $request->get('detail'),
                'ctg_id' => $request->get('category'),
                'subctg_id' => $request->get('subcategory'),
                'user_id' => $user_id,
                'image' => $fileName,
            ]);
        } else {
            $fileName = "";
        }
    }
}
