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
    .bg-delete{
        background: #ff9f9f;
    }

</style>
@stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Administrators</h1>
        
        <a href="#" id="note-link"><i data-feather="info"></i></a>
    </div>
    <div class="col-md-12">
        <div class="container">
        <div class="card-lg pt-2 pb-2 pl-3 pr-2 shadow">

        @if($errors->any())
            <div class="alert alert-danger alert-exists col-md-8">
                {{$errors->first()}}
            </div>
        @endif

        <table class="table table-hover rounded" id="evalueeTable">
            <thead>
                <tr>
                    <td class="bg-success text-white"><b>Name</b></td>
                    <td class="bg-success text-white"><b>Office</b></td>
                    <td class="bg-success text-white"><b>Position</b></td>
                    <td class="bg-success text-white text-center" style="width:5px"><b>Evaluations</b></td>
                    <td id="created-at" style="display:none">Created at</td>
                    <td class="bg-success text-white text-center"><b>Edit</b></td>
                    <td class="bg-success text-white text-center"><b>Delete</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{$admin->lname}}, {{$admin->fname}}</td>
                    <td>{{$admin->office}}</td>
                    <td>{{$admin->position}}</td>
                    <td class="text-center"><a href="{{url('/admins/'.$admin->id)}}" class="btn btn-primary text-white"><i data-feather="eye"></i></a></td>
                    <td style="display:none">{{$admin->created_at}}</td>
                    <td class="text-center"><a href="{{url('/admins/'.$admin->id.'/edit')}}" class="btn btn-warning text-white"><i data-feather="edit-2"></i></a></td>
                    <td class="text-center">
                        <form action="{{route('admins.destroy', $admin->id)}}" method="post" onsubmit=" return confirmDelete();">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger text-white submitDelete" ><i data-feather="trash-2"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
            <a href="{{route('admins.create')}}" class="float">
                <span data-feather="plus" class="my-float"></span>
            </a>
        </div>
    </div>



@stop
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#evalueeTable').DataTable();
            $('#created-at').click();
            $('#created-at').click();

            $('.alert-exists').delay(3000).fadeOut(1000);
            $('#note-link').click(function(){
                $('.note').fadeIn(300).delay(5000).fadeOut(1000);
            })

        });    

       

        function confirmDelete(){
            var result = confirm("You are about to delete this evaluee as well as all his/her evaluations.\n Confirm delete.");
            if (result != true) {
                event.preventDefault();
                returnToPreviousPage();
                return false;
            }
            return true;
        }   

    </script>
@stop