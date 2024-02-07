<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSM EDU</title>

    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}" type="text/css">
    <script src="{{URL::asset('js/jQuery.js')}}"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="{{URL::asset('js/bootstrap.js')}}"></script>
</head>

<body>
    @include('studentlayout.header')

    @yield('myblock')

    @include('studentlayout.footer')

</body>

</html>