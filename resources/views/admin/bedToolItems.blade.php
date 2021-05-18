@extends('layouts.master')
@section('title')
    Teacher Evaluation
@stop
@section("styles")
    <style>
    
        .item-link, .item-link:hover {
            text-decoration: none;
            color: #000;
        }    
        .item-statement{
            width: 80%;
            height: 100px;
        }
        .statementText{
            border: 0px;
            resize: none;
        }
        body{
            background: #f7f7f7;
        }
        .add-criteria{
            position: absolute;
            top: 100px;
            left: 10px;
        }
        .center {
            padding-left: auto;
            padding-right: auto;
            text-align: center;
        }
        .for-review{
            background-color: transparent;
            border:none;
        }
        #view-criteria{
            width: 400px;
            list-style: none;
            display: none;
        }

    </style>
@stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5">{{$header}}</h1>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="card shadow pt-4 pb-4 pr-3">
            <ul id="item-list" class="list-group">
                @foreach($items as $item)
                <li class="list-li list-group-item ml-3">            
                <a href="#" class='item-link' >{{$item->statement}}</a>
                <input type="hidden" value="{{$item->id}}">
                </li>
                @endforeach
            </ul>
            </div>

            <!--update delete modal-->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="item-modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tool Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="col-md-10 offset-md-1" id="form-updateItem" method="post">
                            @csrf
                            <textarea name="statement" class="form-control mt-3 mb-2 statementText"></textarea>
                            <div class="col-md-6 offset-md-4 mb-3">
                            <button class="btn btn-success">Update</button>                            
                            <a class="btn btn-danger" id="btn-delItem">Delete</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
        <form method="post" id="add_item" action="{{url('storeItem')}}" >
            @method('post')
            @csrf
            <div class="form-group ml-4 mb-5" style="position:relative">
                <label for="statement"><b>Create Item</b></label>
                <textarea name="statement" id="statement" style="width:400px; height:100px; resize:none; padding-left:0px" class="form-control mb-2">
                </textarea>
            
              
                <input type="hidden" name="toolId" value="{{$id}}">
                <input type="submit" class="btn btn-primary mt-3" id="add" value="Create Item">
               
            </div>
            <div class="status col-md-8">
            </div>
        </form>
       
        </div>   
    </div>
    

@stop

@section('scripts')

<script >

/*===== Written by Ryan Arcel Galendez =====*/

    $(document).ready(function(){
    
        $("#statement").focus(function(){
            $(this).html()="";
        })

         $('#add_item').submit(function(event){
         event.preventDefault();
             var statement = $("#statement").val();
             $.ajax({
                 url:"{{url('storeItem')}}",
                 method:"POST",
                 data:$(this).serialize(),
                 // dataType:"json",
                 success:function(data){
                     var len = $("#item-list li").length;
                     var html = $("<li class='list-li list-group-item ml-3'><a href='#' class='item-link'>"+statement+"</a></li>").hide().fadeIn(400);
                     var status = $("<div class='alert alert-success' role='alert'><b>Success!</b> Item adedd.</div>").hide().fadeIn(300);
                     $('#item-list').append(html);
                     $("#statement").val("");
                     $(".status").html(status);
                     $(".alert").delay(2500).fadeOut(500);
                 },
                 error: function (e) {      
                     console.log("ERROR : ", e);
                 }
             });
         });
     
         $('.item-link').click(function(){
             var statementText = $(this).html();
            // alert(statementText)
             var id = $(this).next().val();
            // $('.statementText').val(id);
             $('.statementText').val(statementText);
             $('#item-modal').modal('show');
             $('#form-updateItem').attr("action", "/updateItem/"+id)
             $('#btn-delItem').attr("href", "/deleteItem/"+id);
         });
     
         $("#btn-delItem").click(function(e){
             if (!confirm('Are you sure?'))
                 e.preventDefault();
         });
      
     });
</script>
@stop
