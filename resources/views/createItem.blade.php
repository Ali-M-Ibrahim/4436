@extends('layouts.app')

<div class="container">

    <h1 class="text-center">Add new Item</h1>

    <form action="{{route("store-item")}}" method="post">
     @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input value="{{old("item_name")}}"  name="item_name" type="text" id="name" class="form-control" />
            @error("item_name")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Name Confirmatin</label>
            <input value="{{old("item_name2")}}"   name="item_name2" type="text" id="name" class="form-control" />
            @error("item_name2")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <textarea  name="item_description" id="description" class="form-control" > {{old("item_description")}} </textarea>
            @error("item_description")
            {{$message}}
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input value="{{old("item_price")}}"  name="item_price" type="number" id="price" class="form-control" />
            @error("item_price")
            {{$message}}
            @enderror
        </div>


        <div class="form-group">
            <label for="price">Price confirmation</label>
            <input  value="{{old("item_price_confirmation")}}"  name="item_price_confirmation" type="number" id="price" class="form-control" />
            @error("item_price_confirmation")
            {{$message}}
            @enderror
        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-success" />
            <a href="{{route("list-items")}}" class="btn btn-danger">Cancel</a>

        </div>
    </form>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
