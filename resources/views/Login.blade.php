@extends('layouts.app')

<div class="container">

    <h1>Login Page</h1>
    <form action="{{route("check")}}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input value="{{old("email")}}"  name="email" type="text" id="email" class="form-control" />
            @error("email")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input value="{{old("password")}}"   name="password" type="password" id="password" class="form-control" />
            @error("password")
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-success" />
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
