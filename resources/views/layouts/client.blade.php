<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>
<body>
    <div class="wrapper mx-auto flex flex-col min-h-screen" style="max-width: 1440px ">
        @include('blocks.header')
        @yield('content')
        @yield('sidebar')
        @include('blocks.footer')
    </div>
    <script src="{{asset('js/app.js')}}" defer></script>
</body>
</html>