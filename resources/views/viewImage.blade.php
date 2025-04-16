@extends('layouts.app')

<div class="container">
    <h1 class="text-center">The image is:</h1>

{{--    display url image--}}
{{--    <img src="{{$data->path}}" />--}}


{{--    display image in public folder--}}

    <img src="{{asset($data->path)}}" />


</div>
