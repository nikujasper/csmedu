<h1>Welcome

    @if(Session::has('name'))

    {{Session::get('name')}}

    @endif

</h1>