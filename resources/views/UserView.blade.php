<h1>Hello I am user view</h1>

@if(Auth::check())
    <p>the user is connected</p>
    <p>the user name is: {{Auth::user()->name}}</p>
    <p>the user email is: {{Auth::user()->email}}</p>
@endif
