@extends('layouts.master')
@section('title')
    Evaluee
@stop

@section('styles')
<style>
    *{padding:0;margin:0;}
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
        background-color:#00DBA3;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
        
    }

    .my-float{
        margin-top:22px;
    }
</style>
@stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Evaluee</h1>
        <p>*an 'evaluee' could be a teacher or an employee that may undergo a performance evaluation.</p>
    </div>
    <div class="col-md-12">
        <table class="table table-hover table-bordered" style="width:100%" id="evalueeTable">
            <thead>
                <tr>
                    <td class="bg-secondary text-white"><b>Name</b></td>
                    <td class="bg-secondary text-white"><b>Office</b></td>
                    <td class="bg-secondary text-white"><b>Position</b></td>
                    <td class="bg-secondary text-white"><b>View</b></td>
                    <td class="bg-secondary text-white"><b>Edit</b></td>
                    <td class="bg-secondary text-white"><b>Delete</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluees as $evaluee)
                <tr>
                    <td>{{$evaluee->lname}}, {{$evaluee->fname}}</td>
                    <td>{{$evaluee->office}}</td>
                    <td>{{$evaluee->position}}</td>
                    <td><a href="#"><i data-feather="eye"></i></a></td>
                    <td><a href="{{url('/evaluees/'.$evaluee->id.'/edit')}}"><i data-feather="edit-2"></i></a></td>
                    <td><a href="#"><i data-feather="trash-2"></i></a></td>
                </tr>
                @endforeach

                <a href="{{route('evaluees.create')}}" class="float">
                    <span data-feather="plus" class="my-float"></span>
                </a>

            </tbody>
        </table>
   
   
    </div>

@stop
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#evalueeTable').DataTable();
        } );    
    </script>
@stop