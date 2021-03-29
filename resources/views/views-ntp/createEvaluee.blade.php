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
        <form action="{{route('BEDevaluees.store')}}" method="post">
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
            <center>
            <a href="{{route('NTPevaluees.index')}}" class="btn btn-secondary mr-3">Cancel</a><button class="btn" style="background-color: pink">Add</button>
            </center>
            </div>
        </form>
        </div>
    </div>

@stop