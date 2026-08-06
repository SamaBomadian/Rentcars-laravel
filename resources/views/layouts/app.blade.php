<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


</head>
<body>
    {{-- @if(session('success'))
<div class="container mt-3">
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
</div>
@endif --}}

        @include('layouts.navbar')
        @yield('content') 

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>