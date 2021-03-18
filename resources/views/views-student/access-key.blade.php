<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    
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
            .alert-div{
                /* border: solid 1px #000; */
                height: 60px;
                width: 100%;
            }
    </style>
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <title>Access Key</title>
    <link rel="icon" href="{{asset('image/acdseal.png')}}" type="image/x-icon"> 
</head>
<body>



<div class="container-fluid">

<div class="row">
    <div class="col-md-12 pt-5">
        <div class="col-md-4 offset-md-4 mt-5 justify-content-center">
        <center>
            <h4 class="header-facade">ACD Teacher Evaluation System</h4>
            <h3 class="header-facade text-primary font-weight-bold">Welcome!</h2><br>
            <img src="{{asset('image/acdseal.png')}}" id="img-facade">
        </center>
        <div class="card shadow bg-light input-form" style="display:none">
            <div class="card-header bg-secondary text-white">
                Welcome!
            <a class="nav-link text-white float-right p0" href="{{route('logout')}}"><i data-feather="arrow-left"></i></a>                       
            </div>
            <div class="card-body">
                <h5 class="card-title">Enter Access Key</h5>
                <p class="card-text">To begin the evaluation process, ask your moderator for the access key.</p>
                <form method="post" action="{{route('access-page')}}">
                    @method('post')
                    @csrf
                    <div class="form-inline">
                        <input type="text" required name="access_key" class="form-control"> <button class="btn btn-primary ml-3">Enter</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="alert-div">
            <div class="alert alert-info click-more" style="display:none">
                Keep clicking to access input form.
            </div>
        </div>
        </div>
    </div>
            
</div>
    </div>
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script>window.jQuery || document.write("<script src='{{asset('js/jquery-3.3.1.slim.min.js')}}'><\/script>")</script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="{{asset('js/feather.min.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script></body> 
    <script>

            //written by Ryan Arcel Galendez
    $(document).ready(function(){

        var count = 0;
        $('#img-facade').click(function(){
            count++;
            console.log(count);
            if(count == 5){
                $('.click-more').fadeIn(200).delay(1500).fadeOut(300);
            }
            if(count == 10){
                $('.input-form').show(500);
                $('.header-facade').hide(400);
                $('#img-facade').hide(400);
                $('.click-more').fadeOut(300);
            }
        })

        var url = window.location.href;
        var urlArr = url.split("=");
        
        if(urlArr[1] != null){
            if(urlArr[1] == "not-found"){
                $('.input-form').css('display', 'block');
                $('.header-facade').css('display', 'none');
                $('#img-facade').css('display', 'none');
            }
        }
       
    })
    </script>

</body>
</html>


 

