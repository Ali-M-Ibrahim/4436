<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h1>This is my first page</h1>
@include("nab")

<ul>
    @for($i=0; $i < 10; $i++)
       @if($i==3)
{{--            @continue--}}
{{--           @break--}}
        @else
                <li>{{$i}}</li>
        @endif
    @endfor
</ul>


<h1>Data from controller:</h1>

<p>  {{$greet}}   </p>
<p>   {{$msg}} </p>

@isset($nullable)
<p>the variable  is not null</p>
@endisset

@isset($data1)
<p>
    {{$data1}}
</p>
@endisset

@isset($data2)
<p>
    {{$data2}}
</p>
@endisset

</body>
</html>

