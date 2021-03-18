<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   
    @yield('styles')
    
    <style>
            .bd-placeholder-img {
              font-size: 1.125rem;
              text-anchor: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
            }
      
            @media (min-width: 768px) {
              .bd-placeholder-img-lg {
                font-size: 3.5rem;
              }
            }

    </style>
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('image/acdseal.png')}}" type="image/x-icon"> 
</head>
<body class="bg-light">
    <div class="container-fluid">
        @include('layouts.navbar2')
        @yield('content')
    </div>
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script>window.jQuery || document.write("<script src='{{asset('js/jquery-3.3.1.slim.min.js')}}'><\/script>")</script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="{{asset('js/feather.min.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script></body> 
    @yield('scripts')
</body>
</html>