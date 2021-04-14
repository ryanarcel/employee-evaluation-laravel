@extends('layouts.master')
@section('title')
Edit Evaluee
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
        <h1 class="h5">Edit Evaluee</h1>
    </div>
    <div class="col-md-12 pt-3 card shadow">
        <div class="col-md-6 mt-4 mb-4 offset-md-3">
        <form action="{{route('admins.update', $evaluee->id)}}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="fname" value="{{$evaluee->fname}}">
            </div>
            <div class="form-group">
                <label >Last Name</label>
                <input type="text" class="form-control" name="lname" value="{{$evaluee->lname}}">
            </div>
            <div class="form-group">
                <label >Office</label>
                <input type="text" class="form-control" name="office" value="{{$evaluee->office}}" >
            </div>
            <div class="form-group">
                <label >Position</label>
                <input type="text" class="form-control" name="position" value="{{$evaluee->position}}" >
            </div>
            <div class="form-group">
            
            <button class="btn btn-success text-white mt-3" style="width:100%">Update</button>
            <a href="{{route('admins.index')}}" style="width:100%" class="btn btn-secondary mr-3">Cancel</a>
            
            </div>
        </form>
        </div>
    </div>

@stop
