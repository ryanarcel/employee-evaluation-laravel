@extends('layouts.master')
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
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Add Non-teaching Personnel</h1>
        
    </div>
    <div class="col-md-12 pt-3 card bg-light shadow">
        <div class="col-md-6 mt-4 mb-4 offset-md-3">
        <form action="{{route('NTPevaluees.store')}}" method="post">
            @method('post')
            @csrf
            <div class="form-group">
                <label >First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="Juan" required>
            </div>
            <div class="form-group">
                <label >Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Dela Cruz" required>
            </div>
            <div class="form-group">
                <label >Office</label>
                <input type="text" class="form-control" name="office" placeholder="Juan" required>
            </div>
            <div class="form-group">
                <label >Position</label>
                <input type="text" class="form-control" name="position" placeholder="Dela Cruz" required>
            </div>
            <div class="form-group">
            <button class="btn" style="width:100%; background-color:pink">ADD</button>
            <a href="{{route('NTPevaluees.index')}}" class="btn btn-secondary mr-3" style="width:100%">CANCEL</a>
            </div>
            </div>
        </form>
        </div>
    </div>

@stop
