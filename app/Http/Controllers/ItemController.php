<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list(){
        $data = Item::all();
        return View("listItems",compact("data"));
    }

    public function create(){
        return View("createItem");
    }

    public function store(Request $request){

        $obj = new Item();
        $obj->name = $request->item_name;
        $obj->description = $request->item_description;
        $obj->price = $request->item_price;
        $obj->save();
        return redirect()->route("list-items");
    }

    public function delete($id){
        $obj = Item::find($id);
        $obj->delete();
        return redirect()->route("list-items");
    }

    public function Edit($id){
        $obj = Item::find($id);
        return View("editItem")->with("data",$obj);
    }

    public function update(Request $request, $id){
        $obj = Item::find($id);
        $obj->name = $request->item_name;
        $obj->description = $request->item_description;
        $obj->price = $request->item_price;
        $obj->save();
        return redirect()->route("list-items");

    }
}
