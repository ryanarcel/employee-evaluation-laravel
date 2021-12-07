@extends('layouts.master2')
@section('title')
    Teacher Evaluation
@stop

@section('content') 

<div class="col-md-4 offset-md-4 pt-5">
    <div class="alert alert-success mt-5" role="alert">
        <b>Success!</b> You have successfully evaluated your teacher.
    <a href="{{route('logout')}}">Exit</a>
    </div>
</div>


@stop
