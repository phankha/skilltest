<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Detail</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" >
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@include('blocks.header')
@yield('page-content')
@include('blocks.footer')
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{asset('js/app.js')}}" ></script>

</body>
</html>
