<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    //
    public function store(Request $request)
    {
        $item = new Item([
          'name' => $request->get('name'),
          'price' => $request->get('price')
        ]);
        $item->save();
        return response()->json('Successfully added');
    }

    public function postitem(Request $request)
    {
        $items=new Item();
        $items->name=$request->input('name');
        $items->price=$request->input('price');
        $items->save();
        return response()->json(['item'=>$items],201);
    }
    public function getitem()
    {
        $items=Item::all();
        return response()->json(['item'=>$items],201);
    }
}
