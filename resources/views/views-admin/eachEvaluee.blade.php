@extends('layouts.master')
@section('title')
{{$evaluee->fname}} {{$evaluee->lname}}
@stop
@section('styles')
<style>
    label{
        font-weight: bold;
    }
    .card{
        //height: 150px;
        padding-top: 30px;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
@stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h5">{{$evaluee->fname}} {{$evaluee->lname}}</h1>
    </div>

    @if($errors->any())
        <div class="alert alert-info border-light col-md-4 offset-3" style="border-radius: 10px">
        <p style="font-size: 1em;">{{$errors->first()}}</p>
        </div>
    @else
        <form action="{{route('summarize', $evaluee->id)}}" method="post" id="theForm">
        @csrf 
        @method("post")
        <div class="row">
            <div class="col-md-8">
            <table id="evalTable">
                <thead>
                    <th></th>
                </thead>
                <tbody>
                        
        @foreach ($evaluee->evaluations as $evaluation)
        <tr>
            <td>
            <div class="card pt-3 pl-5 pb-2 pr-5 shadow mb-2 bg-light" style="width:150%">
                
                                <div class="row">
                                    <div class="col">
                                        Evaluation Date: <span class="text-primary"><b>{{date('F d, Y', strtotime($evaluation->date))}}</b></span><br><br>
                                        Subject: <span class="text-primary"><b>{{$evaluation->subject}}</b></span><br>
                                        School Year: <span class="text-primary"><b>{{$evaluation->SY_from}}-{{$evaluation->SY_to}}</b></span><br>
                                        Semester: <span class="text-primary"><b>{{$evaluation->semester}}</b></span><br>
                                        Term: <span class="text-primary"><b>{{$evaluation->term}}</b></span>
                                    </div>
                                    <div class="col">
                                        Course: <span class="text-primary"><b>{{$evaluation->course}}</b></span><br><br>
                                        <a href="{{route('evaluations.show', [$evaluation->id, 'origin'=>'evaluee'])}}" class="badge badge-success"><i data-feather="eye"></i> View Results</a>
                                    </div>
                                        <input type="checkbox" class="checks" name="evaluations[]" value="{{$evaluation->id}}" >
                                </div>  
                           
            </div>
            </td>
        </tr>
        @endforeach
                           
                </tbody>
            </table>
            </div>
            <div class="col-md-4">
                <input type="submit" value="Summarize" id="summarize" class="btn btn-primary" style="display:none">
            </div>
        </div>
        </form>
    @endif        
@stop
@section('scripts')
<script>
    $('document').ready(function(){
        jQuery('#theForm input[type=checkbox]').on('change', function () {
            var len = jQuery('#theForm input[type=checkbox]:checked').length;
            if (len > 0) {
                $('#summarize').fadeIn(300);
            } else if (len === 0) {
                $('#summarize').fadeOut(300);
            }
            }).trigger('change');
        
            $('#evalTable').DataTable();
    })
</script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>

@stop
