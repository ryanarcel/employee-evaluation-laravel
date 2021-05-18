@extends('layouts.master')
@section('title')
    Teacher Evaluation
@stop


@section('content') 

<div class="col-md-4 offset-3 mt-5">
    <div class="alert alert-warning" role="alert">
    <b>Not Found!</b> This evaluation has no results yet. <br><a href="{{route('bedevaluations.index')}}">Return</a>
    </div>
</div>

 
@stop