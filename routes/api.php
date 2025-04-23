<?php

use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\UniApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post("login",[APIAuthController::class,'login'])
    ->name("login");
Route::post("register",[APIAuthController::class,'register']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get("get-unis",[UniApiController::class,"index"]);
    Route::post("save-uni",[UniApiController::class,"store"]);
    Route::get("show-uni/{id}",[UniApiController::class,"show"]);
    Route::put("update-uni/{id}",[UniApiController::class,"update"]);
    Route::delete("delete-uni/{id}",[UniApiController::class,"delete"]);
});






