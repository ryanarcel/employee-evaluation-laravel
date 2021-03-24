@extends('layouts.master')
@section('title')
    Evaluation
@stop

@section('styles')
<link rel="stylesheet" href="{{asset('css/eval-select.css')}}">
@stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Setup Evaluation</h1>
    </div>
    <div class="row">

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
            <div class="hovereffect" style="background-color: #d179b5">
                <center>
                    <img class="img-responsive" src="{{asset('image/office.png')}}" alt="">
                </center>
                    <div class="overlay">
                        <h2>Admin<br>Evaluation</h2>
                    <a class="info" href="{{route('adminevaluations.index')}}">Proceed</a>
                    </div>
                </div>
        </div>
          
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
          <div class="hovereffect" style="background-color: #41e577">
              <center>
              <img class="img-responsive" src="{{asset('image/working.png')}}" alt="">
              </center>
              <div class="overlay">
                  <h2>Supervisor<br>Evaluation</h2>
                  <a class="info" href="{{route('supervevaluations.index')}}">Proceed</a>
              </div>
          </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
        <div class="hovereffect" style="background-color: #4891ff">
            <center>
            <img class="img-responsive" src="{{asset('image/teacher.png')}}" alt="">
            </center>
            <div class="overlay">
                <h2>Teacher<br>evaluation</h2>
            <a class="info" href="{{route('evaluations.index')}}">Proceed</a>
            </div>
        </div>
    </div>   

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
        <div class="hovereffect" style="background-color: #a3eff1">
            <center>
            <img class="img-responsive" src="{{asset('image/ntp.png')}}" alt="">
            </center>
            <div class="overlay">
                <h2>Non-teaching Personnel<br>evaluation</h2>
            <a class="info" href="{{route('ntpevaluations.index')}}">Proceed</a>
            </div>
        </div>
    </div> 

    
  </div>

@stop
