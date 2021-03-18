@extends('layouts.master3')
@section('title')
Add Evaluee
@stop
@section('styles')
<style>
    label{
        font-weight: bold;
    }
</style>
@stop
@section('content')
    <div class="col-md-12">
        <h1 class="h5 mb-5">Add Evaluee</h1>
        {{session('account')->id}}<br>
       
    </div>
@stop
