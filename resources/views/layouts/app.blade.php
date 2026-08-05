<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>
    @if(session('success'))
<div class="container mt-3">
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
</div>
@endif
        @yield('content') 

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>