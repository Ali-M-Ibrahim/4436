<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    function create()
    {
        return View("addImage");
    }

    function store(Request $request)
    {
        if($request->hasFile("image")){
            $request->validate([
//                "image"=>'mimes:jpg'
            ]);
            // to store image in public folder
            $file = $request->file("image");
            $fileName = $file->getClientOriginalName();
            $newName = time() . "-" . $fileName;
            $file->storeAs("store3",$newName,'public');

            $img = new Image();
            $img->name="Image 1";
            $img->path="storage/store3/".$newName;
            $img->save();
            return "ok";
        }else{
            return "no image";
        }

    }
    function storeInStorage(Request $request)
    {
        if($request->hasFile("image")){
            $request->validate([
//                "image"=>'mimes:jpg'
            ]);
            // to store image in public folder
            $file = $request->file("image");
            $fileName = $file->getClientOriginalName();
            $newName = $file->store("store2",'public');

            $img = new Image();
            $img->name="Image 1";
            $img->path="storage/".$newName;
            $img->save();
            return "ok";
        }else{
            return "no image";
        }

    }

    function storeInPublic(Request $request)
    {
        if($request->hasFile("image")){
            $request->validate([
                "image"=>'mimes:jpg'
            ]);
            // to store image in public folder
            $file = $request->file("image");
            $fileName = $file->getClientOriginalName();
            $newName = time() . "-" . $fileName;
            $file->move("uploadedImages",$newName);

            $img = new Image();
            $img->name="Image 1";
            $img->path="uploadedImages/".$newName;
            $img->save();
            return "ok";
        }else{
            return "no image";
        }

    }
    function storeUrl(Request $request)
    {
        // to store an image as url
        $img = new Image();
        $img->name="Image 1";
        $img->path=$request->image;
        $img->save();
        return "ok ";
    }

    function display($id)
    {
        $img = Image::find($id);
        return View("viewImage",["data"=>$img]);
    }

}
