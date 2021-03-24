@extends('layouts.master')
@section('title')
    Admin Evaluation
@stop

@section('styles')
<style>
    *{padding:0;margin:0;}
    body{
        background: #f7f7f7;
    }
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px; 
        right:40px;
        background-color:yellow;
        color:#000;
        border-radius:50px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
        
    }

    .my-float{
        margin-top:22px;
    }

    .bg-muted{
        background: #c2f3ee;
    }
    .bg-gray{
        background: #f0feff;
    }
    .archival:hover{
        text-decoration: none;
    }
    .card{
        font-family: Arial, Helvetica, sans-serif;
    }

</style>
@stop

@section('content') 

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">NTP Evaluation</h1>
    </div>
<div class="row">   
    <div class="col-md-8 offset-md-1" >
    <table style="width:100%" id="evalTable">
        <thead style="display:none">
            <tr>
                <th id="sortThID">ID</th>
                <th>Content</th>
                <th>Access Key</th>
                <th>First Name</th>
                <th id="sortThName">Last Name</th>
                <th id="sortThDate">Due Date</th>
                <th id="sortThCreated">Created On</th>
            </tr>
        </thead>
        <tbody id="evalList">

        @foreach ($evaluations as $evaluation)
        <tr>
            <td style="display:none">{{$evaluation->id}}</td>
            <td>
            <div class="card col-md-10 mb-3 shadow-sm card-evaluation" onmouseover="$(this).addClass('bg-gray').addClass('shadow')" onmouseout="$(this).removeClass('bg-gray').removeClass('shadow')">
                <div class="card-body row">
                <div class="col-md-12">
                    <h6 class="card-title float-left" style="color:#111171"><b>{{$evaluation->evaluee['lname']}}, {{$evaluation->evaluee['fname']}}</b></h6>
                    <span><a href="{{route('archival', $evaluation->id)}}" onclick="confirmArchival()" class="float-right text-danger archival" style="font-size:1.5em"><b>&times;</b></a></span>
                </div>
                <div class="col">
                    Due Date: <span class="text-info"><b>{{date('F d, Y', strtotime($evaluation->date))}}</b></span><br>
                    Created on: <span class="text-info"> {{ date('F d, Y', strtotime($evaluation->created_at)) }}</span>
                </div>
                <div class="col pl-5 link-div">
                    Access Key: <span class="text-success font-weight-bold">{{$evaluation->access_key}}</span><br>
                    
                    @if($evaluation->status===0)
                        <a href="{{route('supervOpenClose',['id'=>$evaluation->id, 'status'=>1, 'origin'=>'list'])}}" class="text-muted mr-2" ><i data-feather="toggle-left"></i> Closed</a>
                    @else 
                        <a href="{{route('supervOpenClose',['id'=>$evaluation->id, 'status'=>0, 'origin'=>'list'])}}" class="text-success mr-2"><i data-feather="toggle-right"></i> Open</a>
                    @endif
                    <br>
                
                
                    <br><a href="evaluations/{{$evaluation->id}}"><i data-feather="info"></i> View Results</a><br>
                </div>
                </div>
            </div>
            </td>
            <td style="display:none">{{$evaluation->access_key}}</td>
            <td style="display:none">{{$evaluation->evaluee['fname']}}</td>
            <td style="display:none">{{$evaluation->evaluee['lname']}}</td>
            <td style="display:none">{{$evaluation->date}}</td>
            <td style="display:none">{{$evaluation->created_at}}</td>
        </tr>
        @endforeach
 
        </tbody>
    </table>
            {{-- <div class="col-md-6 offset-md-2 mt-5 mb-5 ">
                {{ $evaluations->links() }}
            </div> --}}
        
    </div>
    <div class="col-md-2 offset-md-1">
        <div class="card shadow" style="width: 100%; margin-top:80px" >
            <ul class="list-group list-group-flush">
                <li class="list-group-item" ><a href="#" id="sortCreation">Sort by recency of creation</a></li>
                <li class="list-group-item" ><a href="#" id="sortDate">Sort by nearest due date</a></li>
                <li class="list-group-item" ><a href="#" id="sortName">Sort by name</a></li>
                <li class="list-group-item" ><a href="{{route('supervisors.index')}}" >View by name</a></li>
          </ul>
        </div>

        <a href="{{route('ntpevaluations.create')}}" class="float">
            <span data-feather="plus" class="my-float"></span>
        </a>

    </div>
</div>
 
@stop
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            var url = window.location.href;
            var arr = url.split("=");

            $('#evalTable').DataTable({
                 "order": [[ 0, "desc" ]]
            });

            if(arr[1]=="success" || arr[1]=="success#"){
                $('#evalList tr td div').first().css('background', '#c2f7bb')
                .delay(1500).animate({backgroundColor: '#fff'},1500);
            }

            $("#sortCreation").parent().addClass('bg-muted');

            $("#sortCreation").click(function(){
                location.reload();
                $(this).parent().toggleClass('bg-muted');
            })
            $("#sortDate").click(function(){
                $('#sortThDate').click();
                $(this).parent().toggleClass('bg-muted');
                $('#sortCreation').parent().removeClass('bg-muted');
                $('#sortName').parent().removeClass('bg-muted');
            })
            $("#sortName").click(function(){
                $('#sortThName').click();
                $(this).parent().toggleClass('bg-muted');
                $('#sortCreation').parent().removeClass('bg-muted');
                $('#sortDate').parent().removeClass('bg-muted');
            })

        })

        function confirmArchival(){
            var result = confirm("You are about to archive this evaluation.\n Confirm archival.");
            if (result != true) {
                event.preventDefault();
                returnToPreviousPage();
                return false;
            }
            return true;
        }

    </script>
@stop