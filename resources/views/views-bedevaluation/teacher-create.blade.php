@extends('layouts.master')
@section('title')
    Create Evaluation
@stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Setup BED Teacher Evaluation</h1>
    </div>
    <div class="col-md-12 pt-3 card bg-light shadow pl-5 pr-5">
      <div class=" mt-4 mb-4">
      <form action="{{route('bedevaluations.store')}}" method="post"  >
          @method('post')
          @csrf
          <input type="hidden" name="evaluee_id" id="evaluee_id" value="">
          <input type="hidden" name="tool_id" value="2">
          
            <div class="form-group form-inline">
              <label class="font-weight-bold float-left">Teacher:</label>
                <input type="text" required class="form-control ml-4" name="teacher" disabled placeholder="Juan Dela Cruz" id="teacher-input" style="width:25%">
                <a class="btn btn-info ml-2" data-toggle="modal" data-target="#tableModal" href="#"><i data-feather="search"></i> Search</a>  
            </div>

          <div class="form-group form-inline">
              <label class="font-weight-bold mr-3">Due Date:</label>
              <input type="date" name="date" required  class="form-control" style="width:25%">
              <label class="font-weight-bold ml-5 mr-3">Subject:</label>
              <input type="text" class="form-control" required name="subject" placeholder="English" style="width:30%">
          </div>
          
          <div class="form-group form-inline">
              <label class="font-weight-bold">BED Unit:</label>
              <input type="radio" name="bed_unit" value="Elementary" required class="ml-4 mr-1">Elementary
              <input type="radio" name="bed_unit" value="Junior High School" required class="ml-5 mr-1">Junior High School
              <input type="radio" name="bed_unit" value="Senior High School" required class="ml-5 mr-1">Senior High School
          </div>
            <div class="form-group form-inline">
              <label class="font-weight-bold">Session:</label>
              <input type="radio" name="session" value="day" required class="ml-4 mr-1">Day
              <input type="radio" name="session" value="evening" required class="ml-5 mr-1" >Evening
            
          </div>

          <div class="form-group ">
            <div class="form-inline">
              <label class="font-weight-bold">Year Level</label>
              <input type="number" name="yrlevel" id="yrlevel" class="form-control ml-2 mr-3" style="width:20%">
              <label class="font-weight-bold ml-3">Section:</label>
              <input type="text" name="section" required  class="form-control ml-2" style="width:20%">
            </div>
          </div>
          <div class="form-group pt-2">
            <div class="form-inline">
              <b>SY From</b> <input type="number" name="SYfrom" class="form-control yrpicker ml-3 mr-3" style="width:20%">
              <b>SY To</b> <input type="number" name="SYto" class="form-control yrpicker ml-2" style="width:20%">
            </div>
          </div>
          <div class="form-group pt-3">
              <a href="{{route('bedevaluations.index')}}" class="btn btn-secondary mr-3">Cancel</a>
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
          <h5 class="modal-title" id="exampleModalLabel">Search Teacher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        Search: <input type="text" name="search-evaluee" class="form-control mb-2" id="search-evaluee">
          <table class="table table-hover table-bordered" style="width:100%" id="evalueeTable">
            <thead>
                <tr>
                    <th style="display:none">ID</th>
                    <th class="bg-info text-white">Name</th>
                    <th class="bg-info text-white">Office</th>
                    <th class="bg-info text-white">Position</th>
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

  $("#search-evaluee").keyup(function () {
    var value = this.value.toLowerCase().trim();

        $("#evalueeTable tr").each(function (index) {
            if (!index) return;
            $(this).find("td").each(function () {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                $(this).closest('tr').toggle(!not_found);
                return not_found;
            });
        });
    });

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
