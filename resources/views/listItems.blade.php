@extends("layouts.app")

<div class="container">
    <h1 class="text-center">List of all existing Items
 <a class="btn btn-success mb-1" href="{{route("create-item")}}">Create</a>
    </h1>
    <table class="table table-striped table-hover">

        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>

        @foreach($data as $obj)
            <tr>
                <td>{{$obj->id}}</td>
                <td>{{$obj->name}}</td>
                <td>{{$obj->description}}</td>
                <td>{{$obj->price}}</td>
                <td>
                    <form  method="post" action="{{route("delete-item",['id'=>$obj->id])}}">
                        @csrf
                        @method("delete")
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                    <a href="{{route("delete-item2",["id"=>$obj->id])}}" > Delete </a>
                    <a href="{{route("edit-item",["id"=>$obj->id])}}" > Edit </a>

                </td>
            </tr>
        @endforeach

    </table>
</div>

