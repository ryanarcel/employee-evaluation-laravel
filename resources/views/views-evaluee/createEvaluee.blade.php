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
        <h1 class="h5">Add Evaluee</h1>
        <p>*an 'evaluee' could be a teacher or an employee that may undergo a performance evaluation.</p>
    </div>
    <div class="col-md-8 pt-3 card bg-light shadow">
        <div class="col-md-6 mt-4 mb-4 offset-md-3">
        <form action="{{route('evaluees.store')}}" method="post">
            @method('post')
            @csrf
            <div class="form-group">
                <label >First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="Juan">
            </div>
            <div class="form-group">
                <label >Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Dela Cruz">
            </div>
            <div class="form-group">
                <label >Office</label>
                <input type="text" class="form-control" name="office" placeholder="Human Resource">
            </div>
            <div class="form-group">
                <label >Position</label>
                <input type="text" class="form-control" name="position" placeholder="Staff">
            </div>
            <div class="form-group">
            <center>
            <a href="{{route('evaluees.index')}}" class="btn btn-secondary mr-3">Cancel</a><button class="btn btn-info">Add</button>
            </center>
            </div>
        </form>
        </div>
    </div>

@stop
