<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ApiController;

use App\Http\Controllers\InvokableController;

use App\Http\Controllers\DataController;

use App\Http\Controllers\CrudController;
use App\Http\Controllers\FrontController;


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



Route::get("endpoint-5",function(){
   return "Hello i am end point number 5" ;
});

Route::get('endpoint-6',function(){
   return response()->json(["firstname"=>"Joe","Lastname"=>"Doe"])
       ->header('header1',123);
});

Route::get("endpoint-7/{id}",function($id){
    return "Hello i am endpoint 7 and the parameter is:" . $id;
});

Route::get('endpoint-8/{id}/{name}',function($id, $name){
    return "Hello i am endpoint 8 and the id is:" . $id . " and the name is: " . $name ;
});

Route::get('endpoint-9/{fname}/{lname}',function ($fname,$lname){
   return response()->json(['firstname'=>$fname,'lastname'=>$lname]);
});


Route::get('named-route',function(){
    return "I am named route";
})->name('my-route-name');




//method 1 (recommended)
//dont forget to include the controller
//use App\Http\Controllers\FirstController;
Route::get('f1',[FirstController::class,'f1'])->name('my-function-1');
Route::get('f2',[FirstController::class,'f2']);
Route::get('f3/{id}',[FirstController::class,'f3']);
Route::get('f4/{fname}/{lname}',[FirstController::class,'f4']);

//method2
Route::get('ff1','App\Http\Controllers\FirstController@f1');

//method 3 not recommeneded
Route::get('fff1',[
    'uses'=> 'App\Http\Controllers\FirstController@f1',
]);

Route::post('post',[FirstController::class,'post']);
Route::put('put',[FirstController::class,'put']);
Route::delete('delete',[FirstController::class,'delete']);


Route::get('optional/{id?}',[FirstController::class,'optional']);

// will create 7 routes
Route::resource('my-resource',ResourceController::class);
// will create only 2 routes for index and create functions
Route::resource('my-resource2',ResourceController::class)->only(['index','create']);

// will create all the routes for the functions except for index (so will create 6 routes)
Route::resource('my-resource3',ResourceController::class)->except(['index']);

// will create routes for functions inside the controller
Route::apiResource('my-api',ApiController::class);

//to create a invokable route for the controller
Route::get('invoke',InvokableController::class);








Route::get("create-data",[DataController::class,'create']);
Route::get("getCustomerById/{id}",[DataController::class,'getCustomerById']);
Route::get("getCredentialsById/{id}",[DataController::class,'getCredentialsById']);
Route::get("create-data2",[DataController::class,'create2']);
Route::get("getAccountById/{id}",[DataController::class,'getAccountById']);
Route::get("create-data3",[DataController::class,'create3']);
Route::get("getServiceById/{id}",[DataController::class,'getServiceById']);

Route::get("getAllCustomers",[DataController::class,'getAllCustomers']);
Route::get("getCustomerByIdOrFail/{id}",[DataController::class,'getCustomerByIdOrFail']);
Route::get("getCustomerByIdOr/{id}",[DataController::class,'getCustomerByIdOr']);
Route::get("getCustomersByAddress/{address}",[DataController::class,'getCustomersByAddress']);
Route::get("getCustomersByAddressFirst/{address}",[DataController::class,'getCustomersByAddressFirst']);
Route::get("getCustomerByConditions",[DataController::class,'getCustomerByConditions']);
Route::get("getCustomerByConditionsOr",[DataController::class,'getCustomerByConditionsOr']);
Route::get("getCustomerIn",[DataController::class,'getCustomerIn']);
Route::get("getCustomerBetween",[DataController::class,'getCustomerBetween']);
Route::get("getCustomerByNameLike",[DataController::class,'getCustomerByNameLike']);
Route::get("getCustomerByAddressIn",[DataController::class,'getCustomerByAddressIn']);
Route::get("getAllCustomerswithlimit",[DataController::class,'getAllCustomerswithlimit']);
Route::get("getNameCustomers",[DataController::class,'getNameCustomers']);
Route::get("getCustomersOderByDob",[DataController::class,'getCustomersOderByDob']);
Route::get("mix",[DataController::class,'mix']);
Route::get("statistics",[DataController::class,'Statistics']);

Route::get("create-m1",[CrudController::class,"createm1"]);
Route::get("create-m2",[CrudController::class,"createm2"]);
Route::post("create-m3",[CrudController::class,"createm3"]);
Route::post("create-m4",[CrudController::class,"createm4"]);

Route::get("update-m1/{id}",[CrudController::class,"updatem1"]);
Route::post("update-m2/{id}",[CrudController::class,"updatem2"]);
Route::post("update-m3/{id}",[CrudController::class,"updatem3"]);

Route::get("delete/{id}",[CrudController::class,"delete"]);

Route::get("massUpdate",[CrudController::class,"massUpdate"]);

Route::get("massDelete",[CrudController::class,"massDelete"]);


Route::get("first-page",[FrontController::class,"index"]);
Route::get("second-page",[FrontController::class,"index2"]);
Route::get("customer-page",[FrontController::class,"dbData"]);
Route::get("list-page",[FrontController::class,"ArrayData"]);





























