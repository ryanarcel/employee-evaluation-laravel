<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <title>Not Found</title>
    <link rel="icon" href="{{asset('image/acdseal.png')}}" type="image/x-icon"> 
</head>
<body>

    <div class="col-md-4 offset-4 " style="padding-top: 200px">
        
        <div class="alert alert-danger" role="alert">
        <b>Not Found!</b> Make sure you entered a valid key. <a href="{{route('access-key',['from'=>'not-found'])}}">Return</a>
        </div>
    </div>

    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script>window.jQuery || document.write("<script src='{{asset('js/jquery-3.3.1.slim.min.js')}}'><\/script>")</script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="{{asset('js/feather.min.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script></body> 
</body>
</html>
