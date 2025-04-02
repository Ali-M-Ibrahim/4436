@extends('layouts.app')

<div class="container">

    <h1 class="text-center">Add new Item</h1>

    <form action="{{route("myitem.store")}}" method="post">
     @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" id="name" class="form-control" />
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" > </textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" type="number" id="price" class="form-control" />
        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-success" />
            <a href="{{route("myitem.index")}}" class="btn btn-danger">Cancel</a>

        </div>
    </form>

</div>
