@extends('layouts.app')

<div class="container">
    <h1 class="text-center">Add new Image</h1>
    <form action="{{route("store-image")}}" method="post" enctype="multipart/form-data">
     @csrf
        <div class="form-group">
            <label for="image">Image</label>
            <input name="image" type="file" id="image" class="form-control" />
       @error("image")
         {{$message}}
            @enderror

        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-success" />
        </div>
    </form>
