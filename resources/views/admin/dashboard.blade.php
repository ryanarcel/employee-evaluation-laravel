@extends('layouts.master')
@section('title')
    Dashboard
@stop
@section('content')


   @if(Auth::check())
   <div class="mt-5">
        <center>
        <h1>Welcome!</h1>
        <img src="{{asset('image/check2.gif')}}" style="width: 30%; height: 30%">
        <h4>You are logged into the ACD Performance Evaluation System.</h4>
        
        </center>
    </div>
   @endif

@stop