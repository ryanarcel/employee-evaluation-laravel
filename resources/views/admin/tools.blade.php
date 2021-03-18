@extends('layouts.master')
@section('title')
    Evaluation Tool
@stop

@section('styles')
<style>
    .list-item{
        font-size: 16px;
    }
</style>
@stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Manage Evaluation Tools</h1>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
        <ul class="list-group ">
        @foreach ($tools as $tool)
            <li class="list-group-item">
            <a href="{{url('/tools')}}/{{$tool->id}}" class="list-item text-dark">
            <span data-feather="{{$tool->feather_data}}" class="mr-2"></span> 
                  {{$tool->toolname}} <span class="sr-only"></span>
                </a>
            </li>
        @endforeach
        </ul>
        </div>
   
    </div>

@stop
