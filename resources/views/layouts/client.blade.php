<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  ></script>
</head>
<body>
    <div class="wrapper mx-auto flex flex-col min-h-screen" >
        @include('blocks.header')
        @yield('content')
       {{--  @yield('sidebar') --}}
        @include('blocks.footer')
    </div>
    <script src="{{asset('js/app.js')}}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/js/main.js"></script>
    @yield('script')
</body>
</html>
