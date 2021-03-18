@extends('layouts.master2')
@section('title')
    Teacher Evaluation
@stop

@section('styles')
<style>
    body {
        counter-reset: section;
    }

    .statement::before {
        counter-increment: section;
        content: counter(section) ". ";
    }
    *{padding:0;margin:0;}
    .container{
        padding-top:80px;
    }
</style>
@stop

@section('content') 

@isset($evaluation)
    @foreach ($evaluation as $eval)
    <div class="container">
    <div class="header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
        <h1 class="h5">Evaluation for Mr/Ms <span class="text-success">{{$eval->evaluee->lname}}, {{$eval->evaluee->fname}}</span></h1>
    </div>
    <div class="row">
    <div class="col-md-9 offset-md-2">
        <p class="mt-4 ml-2 badge badge-info text-wrap" style="font-size: 0.8em"><span class="mr-5">4 - Very Good</span><span class="mr-5">3 - Satisfactory</span><span class="mr-5">2 - Fair</span><span>1 - Poor</span></p>
    
    <form action="{{route('submit-scores')}}" method="post">
        <div class="card shadow mb-5" style="width: 100%;">
        <div class="card-body">
           
            <table class="table">
            <thead>
                <tr>
                    <th>The teacher...</th>
                    <th>4</th>
                    <th>3</th>
                    <th>2</th>
                    <th>1</th>
                    <th>Clear</th>
                </tr>
            </thead>
            <tbody>
            @foreach($eval->tool->items as $item)

                <tr>
                    <td class="col-md-4 statement pl-2">&nbsp;&nbsp;&nbsp;{{$item->statement}}</td>
                    <td><input type="radio" name="{{$item->id}}" class="score_{{$item->id}}" value="4"></td>
                    <td><input type="radio" name="{{$item->id}}" class="score_{{$item->id}}" value="3"></td>
                    <td><input type="radio" name="{{$item->id}}" class="score_{{$item->id}}" value="2"></td>
                    <td><input type="radio" name="{{$item->id}}" class="score_{{$item->id}}" value="1"></td>
                    <td><a href="#" class="badge badge-danger"><i data-feather="minus" onClick="$('.score_{{$item->id}}').prop('checked', false)"></i></a></td>
                    {{-- <input type="hidden" name="item_{{$item->id}}" value="{{$item->id}}"> --}}
                </tr>
                
            @endforeach
            </tbody>
            </table>
            <div class="form-group">
                <label><b>Comment</b></label>
                <textarea name="comment" cols="30" rows="3" style= "resize:none" class="form-control"></textarea>
            </div>

            <center>
            <a href="#" class="btn btn-info" id="firstSubmit" data-toggle="modal" data-target="#modal1">Submit</a>
            </center>

        {{-- modal 1 --}}
        <div class="modal fade " id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content" style="background: #eef183">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thanks!<br>You are about to finish.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="font-weight-normal">Please review your ratings before proceeding.</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Review</button>
                    <a href="#" class="btn btn-info"id="proceed">Proceed</a>
                </div>
                </div>
            </div>
        </div>

        {{-- modal 2 --}}
        <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Please fill out the following information for verification.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Course/Section</label>
                            <input type="text" name="course" class="form-control" style="width:50%;" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        <input type="submit" value="Skip/Submit" id="finalSubmit" class="btn btn-info">
                    </div>
                    </div>
                </div>
        </div>
        </div>
        </div>

        @method('post')
        @csrf
        <input type="hidden" name="evaluation_id" value="{{$eval->id}}">
        <input type="hidden" name="tool_id" value="{{$eval->tool_id}}">

        </form>
    </div>
    </div><!---close row-->


    </div>


    @endforeach
@endisset


@stop
@section('scripts')
<script>
$(document).ready(function(){
    $('#proceed').click(function(){
        $('#modal1').modal('hide');
        $('#modal2').modal('show');
    });
})
</script>
@stop