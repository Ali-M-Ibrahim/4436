<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Item::all();
        return View("listItems2")->with("data",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return View("createItem2");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Item::create($request->all());
        return redirect()->route("myitem.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $obj = Item::find($id);
        return View("viewItem")->with("data",$obj);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obj = Item::find($id);
        return View("editItem2")->with("data",$obj);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = Item::find($id);
        $obj->fill($request->all());
        $obj->save();
        return redirect()->route("myitem.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obj = Item::find($id);
        $obj->delete();
        return redirect()->route("myitem.index");

    }
}
