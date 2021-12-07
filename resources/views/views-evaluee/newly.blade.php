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
    </div>
    <div class="container">
        <div class="modal" id="detailsModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">New Evaluee</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                    <h6 class="mb-3">Name: {{$newEvaluee->fname}} {{$newEvaluee->lname}}</h6>
                    <p>Username: <b>{{$newEvaluee->username}}</b></p>
                    <p>Password: <b>{{$password}}</b></p>
                
                </div>
                <div class="modal-footer">
                <a class="btn btn-primary" href="{{route('evaluees.index')}}">Okay</a>
                </div>
              </div>
            </div>
          </div>
    </div>

@stop
@section('scripts')
<script>
    $(document).ready(function(){
        $("#detailsModal").modal('show');
    })        
    
</script>
@stop