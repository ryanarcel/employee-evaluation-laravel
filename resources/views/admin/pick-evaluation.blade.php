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
            <!-- <a class="info" href="{{route('evaluations.index')}}">Proceed</a> -->
            <a class="info teacherChoice" href="#" data-toggle="modal" data-target="#teacher-Modal">Proceed</a>
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

<!-- teacher modal -->
<div class="modal fade" tabindex="-1" id="teacher-Modal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5>Select Department</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
        <div class="col-md-6 offset-md-3">
            <a href="{{route('bedevaluations.index')}}" class="btn btn-success mb-2" style="width:100%">BED</a>
            <a href="{{route('evaluations.index')}}" class="btn btn-warning text-white" style="width:100%">College</a>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('scripts')
<script>
    $(document).ready(function(){

    })
</script>
@stop