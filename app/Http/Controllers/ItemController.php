<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class ItemController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'checkIfAuthenticated',
        ];
    }

    public function list(){
//        $hashed =  Hash::make("123");
//        $result = Hash::check("1233",$hashed);
//        return $result;
        $data = Item::all();
        return View("listItems",compact("data"));
    }

    public function create(){
        return View("createItem");
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name'=>'required|min:3|max:6|unique:items,name|same:item_name2|regex:/[a-z]/|regex:/[A-Z]/',
            'item_description'=>'required',
            'item_price'=>'required|confirmed'
        ],
        [
            'required'=>"this field :attribute is required please input it"
        ]);

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
