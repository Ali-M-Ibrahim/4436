<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::get("/first-endpoint",function(){
   return "Hello I am you first end point";
});

Route::get('/second-endpoint',function(){
   return 123456;
});

Route::get('/third-endpoint',function(){
   return response()->json(["first_name"=>"Ali", "last_name"=>"Ibrahim","Degree"=>"PhD"]);
});

Route::get('/fourth-endpoint',function (){
    return response()->json(["message"=>"Check headers"])
        ->header('first_key',123)
        ->header('second_key',456);
});


Route::get('/endpoint-5',function (){
    return response()->json(["message"=>"Check headers"])
        ->withHeaders([
            'first_key'=>123,
            'second_key'=>456
        ]);
});
















