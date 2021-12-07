@extends('layouts.master')
@section('title')
    Create Evaluation
@stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Setup Admin Evaluation</h1>
    </div>
    <div class="col-md-12 pt-3 card bg-light shadow pl-5 pr-5">
      <div class=" mt-4 mb-4">
      <form action="{{route('adminevaluations.store')}}" method="post"  >
          @method('post')
          @csrf
          <input type="hidden" name="evaluee_id" id="evaluee_id" value="">
          <input type="hidden" name="tool_id" value="2">
          
            <div class="form-group form-inline">
                <label class="font-weight-bold float-left">Administrator:</label>
                <input type="text" required="true" class="form-control ml-4" name="teacher" disabled placeholder="Juan Dela Cruz" id="teacher-input" style="width:25%">
                <a class="btn btn-info ml-2" data-toggle="modal" data-target="#tableModal" href="#"><i data-feather="search"></i> Search</a>  
            </div>

          <div class="form-group form-inline">
              <label class="font-weight-bold mr-3">Evaluation Due Date:</label>
              <input type="date" name="date" required  class="form-control" style="width:25%">
          </div>
          
          <div class="form-group pt-2">
            <div class="form-inline">
              <b>SY From</b> <input type="number" name="SYfrom" class="form-control yrpicker col-md-3 ml-2 mr-3">
              <b>SY To</b> <input type="number" name="SYto" class="form-control yrpicker col-md-3 ml-2">
            </div>
          </div>
          <div class="form-group pt-3">
              <a href="{{route('admindashboard')}}" class="btn btn-secondary mr-3">Cancel</a>
              <button class="btn btn-info">Create</button>
            </div>
      </form>
      </div>
  </div>

<!--modal -->
  <div class="modal fade" id="tableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog col-md-12" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Search Administrator</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <table class="table table-hover table-bordered" style="width:100%" id="evalueeTable">
            <thead>
                <tr>
                    <th style="display:none">ID</th>
                    <th class="bg-info text-dark">Name</th>
                    <th class="bg-info text-dark">Office</th>
                    <th class="bg-info text-dark">Position</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluees as $evaluee)
                <tr class="theData">
                    <td style="display: none">{{$evaluee->id}}</td>
                    <td>{{$evaluee->lname}}, {{$evaluee->fname}}</td>
                    <td>{{$evaluee->office}}</td>
                    <td>{{$evaluee->position}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
@stop
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script>
$(document).ready(function() {
   $('#evalueeTable').dataTable(); 

    $('.theData').click(function(){
      var id =  $(this).find(":first-child").text();
      var name = $(this).find(":first-child").next().text();
      $('#tableModal').modal('hide');
      $('#teacher-input').val(name);
      $('#evaluee_id').val(id);

    });
    
    $(function() {
        $(".yrpicker").datepicker({dateFormat: 'yy'});
    });
    
    $('.page-link').addClass('shadow');

});    
</script>
@stop
