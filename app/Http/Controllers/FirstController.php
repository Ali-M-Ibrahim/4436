<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    function f1(){
        return "Hello i am first controller and i am function number 1";
    }

    function f2(){
        return response()->json(["firstname"=>"Ali","lastname"=>"ibrahim"]);
    }

    function f3($id){
        return "The id is: " . $id;
    }

    function f4($fname,$lname){
        return response()->json(['firstname'=>$fname,'lastname'=>$lname]);
    }

    function post(Request $request)
    {
        $headervalue = $request->header('myfirstheader');
        $fname = $request->firstname;
        $lname= $request->lastname;
        $age = $request->input('age','20');
        return response()->json(['firstname'=>$fname,'lastname'=>$lname,'age'=>$age]);
    }

    function put(Request $request){
        return "I am put function";
    }

    function delete(Request $request){
        return "I am delete";
    }

    function optional($id=0){
        return "The id is: " . $id;
    }
}
