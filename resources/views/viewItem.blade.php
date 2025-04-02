@extends('layouts.app')

<div class="container">
    <h1> name is: {{$data->name}} </h1>
    <h1> description is: {{$data->description}} </h1>
    <h1> price is: {{$data->price}} </h1>
</div>

<div>
    <a href="{{route("myitem.index")}}" class="btn btn-danger">Back</a>
</div>
